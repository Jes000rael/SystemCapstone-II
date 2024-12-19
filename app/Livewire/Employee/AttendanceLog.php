<?php

namespace App\Livewire\Employee;

use Livewire\Component;

use App\Models\AttendanceRecord;
use App\Models\Cutoff;
use App\Models\BreaktimeLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class AttendanceLog extends Component
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

  
    $this->newTotalTime = Carbon::now()->startOfDay()->addSeconds($newTotalTimeInSeconds);
    
} else {
    $this->newTotalTime = null;
}
    
        $this->loadAttendance($employee_id, $this->cut_off ?: optional($this->cutoffs->first())->cutoff_id);
    }

    public function formatTime($totalSeconds)
{
    if ($totalSeconds === 0) {
        return "No more breaktime";
    }

    if ($totalSeconds < 60) {
        return "{$totalSeconds} seconds ";
    } elseif ($totalSeconds < 3600) {
        $minutes = floor($totalSeconds / 60);
        $seconds = $totalSeconds % 60;
        return sprintf('%02d:%02d', $minutes, $seconds);
    } else {
        $hours = floor($totalSeconds / 3600);
        $minutes = floor(($totalSeconds % 3600) / 60);
        $seconds = $totalSeconds % 60;
        return sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
    }
}

public function getFormattedBreakTimeProperty()
{
    if ($this->breaktime && $this->breaktime->total_hours) {
    
        $timeParts = explode(':', $this->breaktime->total_hours);
        if (count($timeParts) === 3) {
            $hours = (int) $timeParts[0];
            $minutes = (int) $timeParts[1];
            $seconds = (int) $timeParts[2];

      
            $totalSeconds = ($hours * 3600) + ($minutes * 60) + $seconds;

            return $this->formatTime($totalSeconds);
        }
    }


    return 'No break time available';
}

    public function cutoffselect()
{
    $employee_id = Auth::user()->employee_id;

    if ($this->cut_off) {
        Session::put('selected_cut_off', $this->cut_off);
        redirect('/employee/attendance_log');
        $this->loadAttendance($employee_id, $this->cut_off);
    } else {
        $this->attendance = collect();
    }
}

private function loadAttendance($employee_id, $cutoffId)
{
    if ($cutoffId) {
        $cutoff = Cutoff::find($cutoffId);
    
        if ($cutoff) {
            $startDate = \Carbon\Carbon::parse($cutoff->date_start);
            $endDate = \Carbon\Carbon::now()->isAfter($cutoff->date_end) 
                ? \Carbon\Carbon::parse($cutoff->date_end)
                : \Carbon\Carbon::today(); 
    
            // Generate the date range from the start date to the end date
            $dateRange = collect();
            while ($startDate->lte($endDate)) {
                $dateRange->push($startDate->copy());
                $startDate->addDay();
            }
    
          
                $attendanceRecords = AttendanceRecord::where('employee_id', $employee_id)
                ->whereBetween('date', [$cutoff->date_start, $endDate->toDateString()])
                ->orderBy('attendance_id', 'desc')
                ->get()
                ->keyBy('date'); 

                  $this->attendance = $dateRange->map(function ($date) use ($attendanceRecords) {
                  return [
                      'date' => $date->toDateString(),
                      'record' => $attendanceRecords->get($date->toDateString()) ?? null, 
                  ];
                  })

                  ->sortByDesc(function ($item) {
                  return $item['date']; 
                  })
                  ->values(); 

        }
    } else {
        $this->attendance = collect();
    }
    
}


  

    public function resumeBreak()
    {
    
        $endTime = Carbon::now();  
        
      
        
        
        $break = BreaktimeLog::where('attendance_id', $this->latest->attendance_id)
            ->first();
  
        $break->update([
            'start_time' => $endTime,
            'field' => 'Break',
        ]);
    return redirect('/employee/attendance_log');

 
    }

    public function pauseBreak()
    {
        $endTime = Carbon::now();  
        $break = BreaktimeLog::where('attendance_id', $this->latest->attendance_id)
            ->first();
    
        if (!$break) {
            
            throw new \Exception("Break log not found.");
        }
    
        $startTime = Carbon::parse($break->start_time); 
    
        $totalBreakDurationInSeconds = $startTime->diffInSeconds($endTime);
    
        $totalHours = $break->total_hours;
    
  
        $parsedTime = Carbon::createFromFormat('H:i:s', $totalHours);
        $totalTimeInSeconds = $parsedTime->hour * 3600 + $parsedTime->minute * 60 + $parsedTime->second;
    
    
        $newTotalTimeInSeconds = $totalTimeInSeconds - $totalBreakDurationInSeconds;
    
      
        if ($newTotalTimeInSeconds <= 0) {
     
            $break->update([
                'end_time' => $endTime,
                'total_hours' => '00:00:00',
                'field' => 'Duty',
            ]);
    
        $this->updateTotalWorkHours($totalBreakDurationInSeconds);
           
        }else
        {
            // Convert seconds back to a time format
        $newTotalTime = Carbon::parse($newTotalTimeInSeconds);
    
        $break->update([
            'end_time' => $endTime,
            'total_hours' => $newTotalTime->format('H:i:s'),
            'field' => 'Duty',
        ]);
        $this->updateTotalWorkHours($totalBreakDurationInSeconds);

        }
    
        
    
    }
    
    

    public function updateTotalWorkHours($totalBreakDurationInSeconds)
{
    $employee_id = Auth::user()->employee_id;
   
$this->latest = AttendanceRecord::where('employee_id', $employee_id)
->orderBy('attendance_id', 'desc')
->first();

if ($this->latest) {
  
    $totalWorkHoursInSeconds = $this->latest->total_break; 

 
    $updatedTotalWorkInSeconds = $totalWorkHoursInSeconds + $totalBreakDurationInSeconds;

    $updatedTotalWorkInHours = $updatedTotalWorkInSeconds;

    $this->latest->total_break = $updatedTotalWorkInHours;


$this->latest->save();
return redirect('/employee/attendance_log');

}



}

    public function render()
    {
        return view('livewire.employee.attendance-log');
    }
}
