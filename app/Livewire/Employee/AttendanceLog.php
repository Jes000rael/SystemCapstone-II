<?php

namespace App\Livewire\Employee;

use Livewire\Component;

use App\Models\AttendanceRecord;
use App\Models\Cutoff;
use App\Models\BreaktimeLog;
use App\Models\OvertimeLog;
use App\Models\RequestTimeAdjustments;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class AttendanceLog extends Component
{
    public $attendance, $cutoffs, $cut_off, $latest,$breaktime,$cut_attendance,$cutoffdate,$totalDays,$totalHours,$totalOvertime,$overBreak,$totalearned,$employeeRate,$employeePresent,$totalSalary,$ratetoCutoff;
    public $timeShow,$onLeave,$coverup,$absentemp;
    public $newTotalTime; 


    public function mount()
    {

        $companyId = Auth::user()->company_id;
        $employee_id = Auth::user()->employee_id;

        $this->cut_off = Session::get('selected_cut_off', null);
    
       
        $this->cutoffs = Cutoff::where('company_id', $companyId)
        ->whereHas('attendanceRecords', function ($query) use ($employee_id) {
            $query->where('employee_id', $employee_id)
                  ->whereNotNull('cutoff_id');
        })
        ->orderBy('cutoff_id', 'desc')
        ->get();
 
$this->latest = AttendanceRecord::where('employee_id', $employee_id)
->orderBy('date', 'desc')
->first();


$this->cut_attendance = AttendanceRecord::where('employee_id', $employee_id)
    ->whereNotNull('cutoff_id')
    ->orderBy('date', 'desc')
    ->first();



    
    if ($this->cut_attendance && $this->cut_attendance->cutoff) {
         $startDate = \Carbon\Carbon::parse($this->cut_attendance->cutoff->date_start);
        $endDate = \Carbon\Carbon::parse($this->cut_attendance->cutoff->date_end);
    
        $this->cutoffdate = $startDate->format('D, M d Y') . ' - ' . $endDate->format('D, M d Y');
        
        $totalDays1 = $startDate->diffInDays($endDate) + 1;
        $this->totalDays = $totalDays1;

        
    } else {
        $this->cutoffdate = 'No cutoff available';
        $this->totalDays = 0;
    }


    $cutoffIds1 = optional($this->cutoffs->first())->cutoff_id ? [optional($this->cutoffs->first())->cutoff_id] : [];




    $totalHours = AttendanceRecord::where('employee_id', $employee_id)
    ->whereIn('cutoff_id', $cutoffIds1)
    ->sum('total_hours');

    $this->totalHours = $totalHours;
    $onLeave = AttendanceRecord::where('employee_id', $employee_id)
    ->where('status_id', 3)
    ->whereIn('cutoff_id', $cutoffIds1)
    ->whereNotNull('time_out')
    ->sum('total_hours');

    $this->onLeave = $onLeave;
     $absentDays = AttendanceRecord::where('employee_id', $employee_id)
    ->whereIn('cutoff_id', $cutoffIds1)
    ->whereIn('status_id', [4])
    ->count();

$this->absentemp = $absentDays;


    $coverup = RequestTimeAdjustments::whereHas('attendance', function ($query) use ($employee_id, $cutoffIds1) {
        $query->where('employee_id', $employee_id)
    ->whereNotNull('time_out')

              ->whereIn('cutoff_id', $cutoffIds1);
    })->sum('total_hours');


    $totaladdjust = ($coverup ?? 0) + ($onLeave ?? 0);
    $this->totalHours = ($totalHours ?? 0) - $totaladdjust;
    $this->coverup = $coverup;

    $totalOvertime = AttendanceRecord::where('employee_id', $employee_id)
    ->whereIn('cutoff_id', $cutoffIds1)
    ->sum('total_ot');

    $this->totalOvertime = $totalOvertime;

    $overBreak = AttendanceRecord::where('employee_id', $employee_id)
    ->whereIn('cutoff_id', $cutoffIds1)
    ->sum('over_break');

    $this->overBreak = $overBreak;

    $employeeRate = AttendanceRecord::where('employee_id', $employee_id)
    ->whereNotNull('time_out') 
    ->whereIn('cutoff_id', $cutoffIds1)
    ->sum('rate');

    $employeePresent = AttendanceRecord::where('employee_id', $employee_id)
    ->whereNotNull('time_out') 
    ->whereIn('cutoff_id', $cutoffIds1)
    ->count();

   $cutoffRate = Cutoff::whereIn('cutoff_id', (array) $cutoffIds1)->first();

 
    
    


    $totalearned = $totalHours + $totalOvertime - $overBreak;
    $totalRateOfHours = $employeePresent > 0 ? ($employeeRate / $employeePresent) : 0;
    $totalSalary = $totalRateOfHours * $totalearned;

    $ratetoCutoff = $cutoffRate ? ($totalSalary * ($cutoffRate->conversion_rate)) : 0;




    

    $this->totalearned = $totalearned;
    $this->totalSalary = $totalSalary;
    $this->ratetoCutoff = $ratetoCutoff;
    
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
        redirect('/admin/user/attendance');
        $this->loadAttendance($employee_id, $this->cut_off);
    } else {
        redirect('/admin/user/attendance');

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
    return redirect('/admin/user/attendance');

 
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
    if($updatedTotalWorkInHours > 3599){
        $changeOver = $updatedTotalWorkInHours - 3600 ;
        $changeOvers = round(max(0, $changeOver) / 3600, 2);
    $this->latest->over_break = $changeOvers;

} else {
    $this->latest->over_break = 0;
}


$this->latest->save();
return redirect('/admin/user/attendance');

}



}

public function startOver()
{
    $start = Carbon::now();  

    $overtimeLog = OvertimeLog::where('attendance_id', $this->latest->attendance_id)
        ->first();

    if ($overtimeLog) {
        $overtimeLog->update([
            'start_time' => $start,
            'field' => 'started',
        ]);

        return response()->json(['message' => 'Overtime started successfully.']);
    }

    return response()->json(['error' => 'No matching overtime log found.'], 404);
}

public function endOver()
{
    $end = Carbon::now();


    $overtimeLog = OvertimeLog::where('attendance_id', $this->latest->attendance_id)->first();

 
    if (!$overtimeLog) {
        return response()->json(['error' => 'No matching overtime log found.'], 404);
    }


    $overtimeLog->update([
        'end_time' => $end,
        'field' => 'end',
    ]);
 
    if ($overtimeLog->start_time && $overtimeLog->end_time) {
        $timeIn = Carbon::parse($overtimeLog->start_time);
        $timeOut = Carbon::parse($overtimeLog->end_time);

        $totalOt = $timeIn->diffInMinutes($timeOut) / 60; 
        $totalOt = round($totalOt, 2); 

        $this->latest->update([
            'total_ot' => $totalOt,
        ]);

        $diffInSeconds = $timeIn->diffInSeconds($timeOut); 


$hours = floor($diffInSeconds / 3600);
$minutes = floor(($diffInSeconds % 3600) / 60);
$seconds = $diffInSeconds % 60;


$totalOt = sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);


        $overtimeLog->update([
            'total_hours' => $totalOt,
        ]);
    }


    return response()->json(['message' => 'Overtime ended successfully.']);
}







    public function render()
    {
        return view('livewire.employee.attendance-log');
    }
}
