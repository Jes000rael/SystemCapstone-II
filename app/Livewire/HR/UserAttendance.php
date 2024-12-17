<?php
namespace App\Livewire\HR;

use Livewire\Component;
use App\Models\AttendanceRecord;
use App\Models\Cutoff;
use App\Models\BreaktimeLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class UserAttendance extends Component
{
    public $attendance, $cutoffs, $cut_off, $latest,$breaktime;
    public $timeShow;
    public $newTotalTime; 


    public function mount()
    {

        $companyId = Auth::user()->company_id;
        $employee_id = Auth::user()->employee_id;

        $this->cut_off = Session::get('selected_cut_off', null);
    
       
        $this->cutoffs = Cutoff::where('company_id', $companyId)
            ->whereHas('attendanceRecords', function ($query) {
                $query->whereNotNull('cutoff_id');
            })
            ->orderBy('cutoff_id', 'desc')
            ->get();
    
 
$this->latest = AttendanceRecord::where('employee_id', $employee_id)
->orderBy('attendance_id', 'desc')
->first();


if ($this->latest === null) {

$this->latest = null;  

}


if ($this->latest !== null) {
$this->breaktime = BreaktimeLog::where('attendance_id', $this->latest->attendance_id)
    ->first();


if ($this->breaktime === null) {
 
    $this->breaktime = null; 

}
}

    
        if ($this->breaktime) {
          
            $endTime = Carbon::now();  
    
           
            $startTime = Carbon::parse($this->breaktime->start_time);  
    
           
            $totalBreakDurationInSeconds = $startTime->diffInSeconds($endTime);
    
           
            $totalHours = $this->breaktime->total_hours;
            $parsedTime = Carbon::createFromFormat('H:i:s', $totalHours);
    

            $totalTimeInSeconds = $parsedTime->hour * 3600 + $parsedTime->minute * 60 + $parsedTime->second;
    
     
            $newTotalTimeInSeconds = $totalTimeInSeconds - $totalBreakDurationInSeconds;
    
        
            $this->newTotalTime = Carbon::parse($newTotalTimeInSeconds);
        } else {
        
            $this->newTotalTime = null;
        }
    
        $this->loadAttendance($employee_id, $this->cut_off ?: optional($this->cutoffs->first())->cutoff_id);
    }
    

    public function cutoffselect()
    {
        $employee_id = Auth::user()->employee_id;

        if ($this->cut_off) {
            Session::put('selected_cut_off', $this->cut_off);
            $this->loadAttendance($employee_id, $this->cut_off);
        } else {
            $this->attendance = collect(); 
        }
    }

    private function loadAttendance($employee_id, $cutoffId)
    {
        if ($cutoffId) {
            $this->attendance = AttendanceRecord::where('employee_id', $employee_id)
                ->where('cutoff_id', $cutoffId)
                ->orderBy('attendance_id', 'desc')
                ->get();
        } else {
            $this->attendance = collect(); 
        }
    }

  

    public function resumeBreak()
    {
        // Store the end time when the break is paused
        $endTime = Carbon::now();  // This will give you the current time
        
      
        
        // Retrieve the most recent break log entry for the current attendance
        $break = BreaktimeLog::where('attendance_id', $this->latest->attendance_id)
            ->first();
    
        // Update the break log with the new total hours
        $break->update([
            'start_time' => $endTime,
            'field' => 'Break',
        ]);
    return redirect('/admin/user/attendance');

 
    }

    public function pauseBreak()
    {
        // Store the end time when the break is paused
        $endTime = Carbon::now();  // This will give you the current time
        
      
        
        // Retrieve the most recent break log entry for the current attendance
        $break = BreaktimeLog::where('attendance_id', $this->latest->attendance_id)
            ->first();
    
        
        
        // Ensure start_time is a Carbon instance
        $startTime = Carbon::parse($break->start_time);  // Convert start_time to a Carbon instance
    
 
        
        // Calculate the break duration in seconds
        $totalBreakDurationInSeconds = $startTime->diffInSeconds($endTime);
    
        
        // Assuming $break->total_hours is in HH:MM:SS format, e.g., '00:59:59'
$totalHours = $break->total_hours;  // This is a string in HH:MM:SS format

// Parse total_hours to a Carbon instance
$parsedTime = Carbon::createFromFormat('H:i:s', $totalHours);

// Convert total_hours (HH:MM:SS) into total seconds
$totalTimeInSeconds = $parsedTime->hour * 3600 + $parsedTime->minute * 60 + $parsedTime->second;



    
        // Subtract the break duration (in seconds) from total_time (in seconds)
        $newTotalTimeInSeconds = $totalTimeInSeconds - $totalBreakDurationInSeconds;
    
     
    
        // Convert the new total seconds back to a Carbon instance and format as HH:MM:SS
        $newTotalTime = Carbon::parse($newTotalTimeInSeconds);
    
     
    
        // Update the break log with the new total hours
        $break->update([
            'end_time' => $endTime,
            'total_hours' => $newTotalTime->format('H:i:s'),  // Format back to HH:MM:SS
            'field' => 'Duty',
        ]);
        $this->updateTotalWorkHours($totalTimeInSeconds);
    }
    

    public function updateTotalWorkHours($totalTimeInSeconds)
{
    // Get the latest attendance record
    $attendanceRecord = $this->latest;

    // Convert total_hours from hours to seconds (if it's stored in hours)
    $totalWorkHoursInSeconds = $attendanceRecord->total_break * 3600; // Convert to seconds

    // Subtract the break duration (in seconds)
    $updatedTotalWorkInSeconds = $totalWorkHoursInSeconds + $totalTimeInSeconds;

    // Convert back to hours and update the total hours in the attendance record
    $attendanceRecord->total_break = $updatedTotalWorkInSeconds / 3600; // Convert seconds back to hours
    $attendanceRecord->save();
    return redirect('/admin/user/attendance');

}







    public function render()
    {
        return view('livewire.h-r.user-attendance');
    }
}
