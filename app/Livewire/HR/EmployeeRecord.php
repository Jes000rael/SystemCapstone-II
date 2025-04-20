<?php
namespace App\Livewire\HR;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Models\EmployeeRecords;
use App\Models\Company;
use App\Models\AttendanceRecord;
use App\Models\Cutoff;
use App\Models\OvertimeLog;
use Carbon\Carbon;
use App\Models\BreaktimeLog;
use App\Models\WorkSchedule;


use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Session;


class EmployeeRecord extends Component
{
    public $employees;
    public $employee_id;

    public function mount()
    {
        $this->updateEmployee();

    }


    public function updateEmployee()
    {
        $companyId = Auth::user()->company_id;
        $this->employees = EmployeeRecords::with(
            'company', 'work_sched', 'deduction', 'meritLog', 'absence', 
            'shift', 'department', 'jobtitle', 'seniorityLevel', 'employmentStatus'
        )
        ->where('company_id', $companyId)
        ->whereNotIn('department_id', [1, 3])
        ->get();
    }
    public function deleteEmployee($employeeId)
    
    {
    
        if ($employeeId) {
            EmployeeRecords::find($employeeId)->delete();
        
            $this->updateEmployee();
    
            return redirect()->intended('admin/employee_records')->with('employee-deleted', 'Successfully');
            // $this->dispatch('company-deleted', ['message' => 'Company Deleted successfully!']);
    
           
        }
    }
 

    

    public function absence($absentID)
    {
        if (!$absentID) {
            return redirect()->back()->with('error', 'Invalid employee ID.');
        }
    
        $employee = EmployeeRecords::findOrFail($absentID);
        $this->employee_id = $employee->employee_id;
    
        $now = Carbon::now();
        $currentDate = $now->toDateString();
        $weekday = strtolower($now->format('l'));
    
        // Get latest cutoff
        $latestCutoff = Cutoff::where('company_id', Auth::user()->company_id)
            ->latest('cutoff_id')
            ->first();
    
        if (!$latestCutoff) {
            return redirect()->back()->with('error', 'No cutoff record found.');
        }
    
        $cutoffStart = Carbon::parse($latestCutoff->date_start)->toDateString();
        $cutoffEnd = Carbon::parse($latestCutoff->date_end)->toDateString();
    
        if ($currentDate < $cutoffStart || $currentDate > $cutoffEnd) {
            return redirect()->back()->with('error', "Current date ($currentDate) is outside the cutoff range ($cutoffStart to $cutoffEnd).");
        }
    
        // Fetch work schedule
        $schedule = WorkSchedule::where('company_id', Auth::user()->company_id)
            ->where('employee_id', $this->employee_id)
            ->first();
    
        if (!$schedule) {
            return redirect()->intended('/admin/employee_records')->with('worksched', 'No Work schedule found.');
        }
    
        // Try today's schedule
        $scheduleIn = $schedule?->{$weekday . '_in'};
        $scheduleOut = $schedule?->{$weekday . '_out'};
        $attendanceDate = $currentDate;
    
        // If no schedule for today, check yesterday
        if (empty($scheduleIn) || empty($scheduleOut)) {
            $yesterday = $now->copy()->subDay();
            $weekday = strtolower($yesterday->format('l'));
    
            $scheduleIn = $schedule?->{$weekday . '_in'};
            $scheduleOut = $schedule?->{$weekday . '_out'};
            $attendanceDate = $yesterday->toDateString();
            $isNightShift = Carbon::parse($scheduleIn)->greaterThan(Carbon::parse($scheduleOut));
            if($isNightShift)
            {
                $attendanceDate = $now->toDateString();
            }
    
            // If still no schedule
            if (empty($scheduleIn) || empty($scheduleOut)) {
                return redirect()->intended('/admin/employee_records')->with('worksched', 'No Work schedule available for today or yesterday.');
            }
        }
    
        // Detect night shift (in > out)
        $isNightShift = Carbon::parse($scheduleIn)->greaterThan(Carbon::parse($scheduleOut));
        $timeNow = Carbon::now(); 

        if ($isNightShift) {
            if ($timeNow->greaterThan(Carbon::parse($scheduleOut))) {
                
                $attendanceDate = $now->toDateString();
            } else {
                $attendanceDate = Carbon::parse($attendanceDate)->subDay()->toDateString();
            }
        }
    
        // Prevent duplicate
        $existingAttendance = AttendanceRecord::where('employee_id', $absentID)
            ->whereDate('date', $attendanceDate)
            ->first();
    
        if ($existingAttendance) {
            return redirect()->intended('/admin/employee_records')->with('employee_has_absent', 'Attendance already exists.');
        }
    
        // Save attendance
        $attendance = AttendanceRecord::create([
            'company_id' => Auth::user()->company_id,
            'employee_id' => $employee->employee_id,
            'cutoff_id' => $latestCutoff->cutoff_id ?? null,
            'rate' => $employee->hourly_rate,
            'date' => $attendanceDate,
            'duty_start' => $scheduleIn,
            'duty_end' => $scheduleOut,
            'time_in' => null,
            'status_id' => 1, // Absent
            'has_night_diff' => $employee->has_night_diff,
        ]);
    
        BreaktimeLog::create([
            'attendance_id' => $attendance->attendance_id,
            'total_hours' => '00:59:59',
            'field' => '',
        ]);
    
        $this->dispatch('close-absence-modal');
    
        return redirect()->intended('/admin/employee_records')->with('absent_emp', 'Absent record successfully created.');
    }
    
    
    
    
    
    public function render()
    {
        return view('livewire.h-r.employee-record');
    }
}

