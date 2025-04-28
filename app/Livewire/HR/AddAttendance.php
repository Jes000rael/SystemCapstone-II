<?php

namespace App\Livewire\HR;
use Livewire\Component;

use App\Models\AttendanceRecord;
use App\Models\OvertimeLog;
use App\Models\RequestTimeType;
use App\Models\BreaktimeLog;
use App\Models\Cutoff;
use App\Models\RequestTimeAdjustments;
use App\Models\EmployeeRecords;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;


class AddAttendance extends Component
{

    public $timetype,$employee_id,$cutoff,$cutoff_id,$date_of_attendance;
    public $start_time ='',$end_time='',$total_hours='';
    public $total_ot_checked = false;
public $total_ot = null;

    public function rules()
    {
        return [
            'cutoff_id' => 'required',
            'date_of_attendance' => 'required|date',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after_or_equal:start_time',
            'total_hours' => 'required|numeric|min:0',
            'total_ot' => 'min:0',
        ];
    }
    
    public function mount($empID)
    {
        $this->loadDropdownData();
        try {
            $decryptedempID = Crypt::decrypt($empID);
        $timeadjust = EmployeeRecords::findOrFail($decryptedempID);
            $this->employee_id = $timeadjust->employee_id;
          
     
            
         
        } catch (DecryptException $e) {
         
            session()->flash('error', 'Invalid or corrupted ID.');
        } catch (ModelNotFoundException $e) {
        
            session()->flash('error', 'Employee ID not found.');
        } catch (\Exception $e) {
          
            session()->flash('error', 'An unexpected error occurred: ' . $e->getMessage());
        }

        
    
    }
  
    public function loadDropdownData()
    {
        $this->cutoff = Cutoff::select('cutoff_id', 'date_start', 'date_end')
            ->where('company_id', Auth::user()->company_id)
            ->orderBy('date_start', 'desc')
            ->get();
    }
    


    public function niceka()
    {
    
        $this->validate();
    

        if ($this->start_time && $this->date_of_attendance) {
            $startDate = date('Y-m-d', strtotime($this->start_time));
            if ($startDate !== $this->date_of_attendance) {
                session()->flash('error', 'The date part of Start Time must match Date of Attendance.');
                return;
            }
        }
    

        $cutoff = Cutoff::find($this->cutoff_id);
        if ($cutoff) {

            if ($this->date_of_attendance < $cutoff->date_start || $this->date_of_attendance > $cutoff->date_end) {
                session()->flash('error', 'The Date of Attendance must be within the selected Cutoff Period.');
                return;
            }
        }
    
    
        $employee = AttendanceRecord::where('employee_id', $this->employee_id)
            ->where('date', $this->date_of_attendance)
            ->first();
    
        if ($employee) {
            session()->flash('error', 'Employee already has attendance on this date.');
            return;
        }
    

        $timeadjust = EmployeeRecords::findOrFail($this->employee_id);
    

        $attendance = AttendanceRecord::create([
            'company_id' => Auth::user()->company_id,
            'employee_id' => $this->employee_id,
            'cutoff_id' => $this->cutoff_id,
            'total_hours' => $this->total_hours,
            'total_ot' => $this->total_ot,
            'rate' => $timeadjust->hourly_rate,
            'date' => $this->date_of_attendance,
            'duty_start' => null,
            'duty_end' => null,
            'time_in' => $this->start_time,
            'time_out' => $this->end_time, 
            'status_id' => 1,
            'has_night_diff' => $timeadjust->has_night_diff,
        ]);
    

        BreaktimeLog::create([
            'attendance_id' => $attendance->attendance_id,
            'total_hours' => '00:59:59',
            'field' => '',
        ]);
    

        return redirect()->intended('/admin/attendance')->with('add_attendance', 'Successful');
    }
    

    public function render()
    {
        return view('livewire.h-r.add-attendance');
    }
}
