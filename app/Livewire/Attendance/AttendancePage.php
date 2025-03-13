<?php

namespace App\Livewire\Attendance;

use Livewire\Component;


use App\Models\AttendanceRecord;
use App\Models\WorkSchedule; 
use App\Models\EmployeeRecords; 
use Carbon\Carbon;
use App\Models\BreaktimeLog;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\Rule;


class AttendancePage extends Component
{
    public $employee_id;
    public $companyName;

    public function mount()
    {

        $this->companyName = \App\Models\Company::where('company_id', Auth::user()->company_id)->pluck('description')->first();

    }

    public function empAttendance()
    {
       
        $this->validate([
            'employee_id' => [
                'required',
                Rule::exists('employee_records', 'employee_id')->where(function ($query) {
                    return $query->where('company_id', Auth::user()->company_id);
                })
            ],
        ]);
    

        $currentDate = Carbon::now();
        $weekday = strtolower($currentDate->format('l'));
    

        $workSchedule = WorkSchedule::where('employee_id', $this->employee_id)->first();
    
 
        if (!$workSchedule) {
            session()->flash('error', 'You have no work schedule for today');
            return;
        }
    
    
        $workStartTime = $workSchedule->{$weekday . '_in'};
        $workEndTime = $workSchedule->{$weekday . '_out'};
    
  
        if (!$workStartTime || !$workEndTime) {
            session()->flash('error', 'No work schedule for today.');
            return;
        }
    
        $currentTime = Carbon::now();
        $scheduledStartTime = Carbon::createFromFormat('H:i:s', $workStartTime);
    

        $attendance = AttendanceRecord::where('employee_id', $this->employee_id)
            ->whereDate('date', $currentDate->toDateString())
            ->first();
    
        if ($attendance) {
           
            if ($attendance->time_out) {
                session()->flash('info', 'You are already time out.');
                return;
            }
        }
    
      
        if ($currentTime > $scheduledStartTime && !$attendance) {
    
            
            $latenessDuration = $currentTime->diff($scheduledStartTime);
            $lateHours = $latenessDuration->h;
            $lateMinutes = $latenessDuration->i;
            $lateSeconds = $latenessDuration->s;
        
            $latenessMessage = '';
        
            
            if ($lateHours > 0) {
                $latenessMessage .= $lateHours . ' hour' . ($lateHours > 1 ? 's' : '') . ' and ';
            }
        
            if ($lateMinutes > 0) {
                $latenessMessage .= $lateMinutes . ' minute' . ($lateMinutes > 1 ? 's' : '') . ' and ';
            }
        
        
            if ($lateSeconds > 0) {
                $latenessMessage .= $lateSeconds . ' second' . ($lateSeconds > 1 ? 's' : '') . ' late.';
            } else {
        
                $latenessMessage = rtrim($latenessMessage, ' and ') . ' late.';
            }
        

            $employee = EmployeeRecords::where('employee_id', $this->employee_id)->first();
            $latestCutoff = \App\Models\Cutoff::where('company_id', Auth::user()->company_id)
                ->latest('cutoff_id')
                ->first();
        
            $currentDate = Carbon::now()->toDateString(); 
        
           
            if ($latestCutoff) {
                $cutoffStart = Carbon::parse($latestCutoff->date_start)->toDateString(); 
                $cutoffEnd = Carbon::parse($latestCutoff->date_end)->toDateString();    
        
                if ($currentDate < $cutoffStart || $currentDate > $cutoffEnd) {
                    session()->flash('error', "Current date ($currentDate) is outside the cutoff range ($cutoffStart to $cutoffEnd).");
                    return;
                } 
            } else {
                session()->flash('error', 'No cutoff record found.');
                return;
            }
        
     
            if ($workSchedule) {
                $dutyStart = $workSchedule->{$weekday . '_in'};
                $workEndTime = $workSchedule->{$weekday . '_out'};
        
                if ($dutyStart) {
                   
                    $attendance = AttendanceRecord::create([
                        'company_id' => Auth::user()->company_id,
                        'employee_id' => $this->employee_id,
                        'cutoff_id' => $latestCutoff->cutoff_id,
                        'rate' => $employee->hourly_rate,
                        'date' => $currentDate,
                        'duty_start' => $dutyStart,
                        'duty_end' => $workEndTime,
                        'time_in' => $currentTime, 
                        'status_id' => 1,
                        'has_night_diff' => $employee->has_night_diff,
                    ]);
        
                    
                    BreaktimeLog::create([
                        'attendance_id' => $attendance->attendance_id,
                        'total_hours' => '00:59:59',
                        'field' => '',  
                    ]);
        
                    session()->flash('success', 'Time-in recorded successfully!');
                } else {
                    session()->flash('error', 'No work schedule found for today.');
                }
            } else {
                session()->flash('error', 'You have no work schedule for today');
            }
        
          
            session()->flash('error', 'You are late! Your scheduled start time was ' . $scheduledStartTime->format('g:i A') . '. Your lateness: ' . $latenessMessage);
            return;
        }
        
        
                 
$currentTime = Carbon::now();
$currentDate = $currentTime->toDateString();
$yesterdayDate = $currentTime->copy()->subDay()->toDateString();

$attendance = AttendanceRecord::where('employee_id', $this->employee_id)
    ->where(function ($query) use ($currentDate, $yesterdayDate) {
        $query->whereDate('date', $currentDate)
              ->orWhereDate('date', $yesterdayDate);
    })
    ->latest('date')
    ->first();


if ($attendance) {
    if (!$attendance->time_out) {
   
     $currentDate = Carbon::now();
     $weekday = strtolower($currentDate->format('l'));
 
   
     $workSchedule = WorkSchedule::where('employee_id', $this->employee_id)->first();

     $attendance = AttendanceRecord::where('employee_id', $this->employee_id)
     ->whereDate('date', $currentDate->toDateString())
     ->first();
 
  
     if (!$workSchedule) {
         session()->flash('error', 'You have no work schedule for today');
         return;
     }
 
   
     $workStartTime = $workSchedule->{$weekday . '_in'};
     $workEndTime = $workSchedule->{$weekday . '_out'};
 
   
     if (!$workStartTime || !$workEndTime) {
         session()->flash('error', 'No work schedule for today.');
         return;
     }
 
     $currentTime = Carbon::now();
     $scheduledStartTime = Carbon::createFromFormat('H:i:s', $workStartTime);
 

       $minutesBeforeSchedule = $scheduledStartTime->diffInMinutes($currentTime);
       if($minutesBeforeSchedule < 120 )
       {
       if($attendance)
       {
         
         try {
            $dutyStart = Carbon::createFromFormat('Y-m-d H:i:s', $attendance->date . ' ' . $attendance->duty_start);
            $timeIn = Carbon::parse($attendance->time_in);
            $currentTime = Carbon::now();
        } catch (\Exception $e) {
            session()->flash('error', 'Invalid time format detected.');
            return;
        }

      
     
        if ($currentTime->lt($dutyStart)) {
     
            $timeWorkedInMinutes = 0;
        } elseif ($timeIn->lt($dutyStart)) {
          
            $timeWorkedInMinutes = $dutyStart->diffInMinutes($currentTime);
        } else {
          
            $timeWorkedInMinutes = $timeIn->diffInMinutes($currentTime);
        }

        

   
        if ($timeWorkedInMinutes < 60) {
            session()->flash('error', 'You must work at least 1 hour before timing out.');
            return;
        }


        

     $employee = EmployeeRecords::where('employee_id', $this->employee_id)->first();
     $latestCutoff = \App\Models\Cutoff::where('company_id', Auth::user()->company_id)
     ->latest('cutoff_id')
     ->first();
 
     $currentDate = Carbon::now()->toDateString();

     if ($latestCutoff) {
         $cutoffStart = Carbon::parse($latestCutoff->date_start)->toDateString();
         $cutoffEnd = Carbon::parse($latestCutoff->date_end)->toDateString();    
     
         if ($currentDate < $cutoffStart || $currentDate > $cutoffEnd) {
            
             session()->flash('error', "Current date ($currentDate) is outside the cutoff range ($cutoffStart to $cutoffEnd).");
             return ;
         } 
     } else {
       
         session()->flash('error', 'No cutoff record found.');
         return ;
     }


    
     if ($workSchedule) {
         $dutyStart = $workSchedule->{$weekday . '_in'};
         $workEndTime = $workSchedule->{$weekday . '_out'};


       
         $currentDate = Carbon::now();
         if ($dutyStart) {
            $attendance = AttendanceRecord::create([
                'company_id' => Auth::user()->company_id,
                'employee_id' => $this->employee_id,
                'cutoff_id' => $latestCutoff->cutoff_id,
                'rate' => $employee->hourly_rate,
                'date' => $currentDate->toDateString(),
                'duty_start' => $dutyStart,
                'duty_end' => $workEndTime,
                'time_in' => $currentTime, 
                'status_id' => 1,
                'has_night_diff' => $employee->has_night_diff,
            ]);
            
            
            BreaktimeLog::create([
                'attendance_id' => $attendance->attendance_id,
                'total_hours' => '00:59:59',
                'field' => '',  
            ]);
             session()->flash('success', 'Time-in recorded successfully!');
         } else {
             session()->flash('error', 'No work schedule found for today.');
         }
     } else {
         session()->flash('error', 'You have no work schedule for today');
     }
       }else{
        

     $employee = EmployeeRecords::where('employee_id', $this->employee_id)->first();
     $latestCutoff = \App\Models\Cutoff::where('company_id', Auth::user()->company_id)
     ->latest('cutoff_id')
     ->first();
 
     $currentDate = Carbon::now()->toDateString();

     if ($latestCutoff) {
         $cutoffStart = Carbon::parse($latestCutoff->date_start)->toDateString();
         $cutoffEnd = Carbon::parse($latestCutoff->date_end)->toDateString();
     
         if ($currentDate < $cutoffStart || $currentDate > $cutoffEnd) {
             
              session()->flash('error', "Current date ($currentDate) is outside the cutoff range ($cutoffStart to $cutoffEnd).");
              return ;
         } 
     } else {
         
          session()->flash('error', 'No cutoff record found.');
          return ;
     }

     
     if ($workSchedule) {
         $dutyStart = $workSchedule->{$weekday . '_in'};
         $workEndTime = $workSchedule->{$weekday . '_out'};


        
         $currentDate = Carbon::now();
         if ($dutyStart) {
            $attendance = AttendanceRecord::create([
                'company_id' => Auth::user()->company_id,
                'employee_id' => $this->employee_id,
                'cutoff_id' => $latestCutoff->cutoff_id,
                'rate' => $employee->hourly_rate,
                'date' => $currentDate->toDateString(),
                'duty_start' => $dutyStart,
                'duty_end' => $workEndTime,
                'time_in' => $currentTime, 
                'status_id' => 1,
                'has_night_diff' => $employee->has_night_diff,
            ]);
            
            
            BreaktimeLog::create([
                'attendance_id' => $attendance->attendance_id,
                'total_hours' => '00:59:59',
                'field' => '',  
            ]);
             session()->flash('success', 'Time-in recorded successfully!');
         } else {
             session()->flash('error', 'No work schedule found for today.');
         }
     } else {
         session()->flash('error', 'You have no work schedule for today');
     }
       }
    } else {

              
$currentTime = Carbon::now();
$currentDate = $currentTime->toDateString();
$yesterdayDate = $currentTime->copy()->subDay()->toDateString();

$attendance = AttendanceRecord::where('employee_id', $this->employee_id)
    ->where(function ($query) use ($currentDate, $yesterdayDate) {
        $query->whereDate('date', $currentDate)
              ->orWhereDate('date', $yesterdayDate);
    })
    ->latest('date')
    ->first();
         
    if (!$attendance->time_out) {
        try {
            $dutyStart = Carbon::createFromFormat('Y-m-d H:i:s', $attendance->date . ' ' . $attendance->duty_start);
            $timeIn = Carbon::parse($attendance->time_in);
            $currentTime = Carbon::now();
        } catch (\Exception $e) {
            session()->flash('error', 'Invalid time format detected.');
            return;
        }

      
       
        if ($currentTime->lt($dutyStart)) {
           
            $timeWorkedInMinutes = 0;
        } elseif ($timeIn->lt($dutyStart)) {
            
            $timeWorkedInMinutes = $dutyStart->diffInMinutes($currentTime);
        } else {
           
            $timeWorkedInMinutes = $timeIn->diffInMinutes($currentTime);
        }



   
        if ($timeWorkedInMinutes < 60) {
            session()->flash('error', 'You must work at least 1 hour before timing out.');
            return;
        }

       
        $attendance->update([
            'time_out' => $currentTime,
        ]);
        if($attendance->duty_start > $attendance->duty_end)
        {
        
if ($attendance->time_in && $attendance->time_out) {
    $timeIn = Carbon::parse($attendance->time_in);
    $timeOut = Carbon::parse($attendance->time_out);
    $dutyStart = Carbon::parse($attendance->date . ' ' . $attendance->duty_start);
    $attendanceDate = Carbon::parse($attendance->date)->addDay();
    $dutyEnd = Carbon::parse($attendanceDate->toDateString() . ' ' . $attendance->duty_end);

    if ($timeIn->greaterThan($dutyStart) && $timeOut->lessThan($dutyEnd)) {
      
        $totalHours = $timeIn->diffInMinutes($timeOut) / 60;
    } elseif ($timeIn->lessThan($dutyStart) && $timeOut->lessThan($dutyEnd)) {
       
        $totalHours = $dutyStart->diffInMinutes($timeOut) / 60;
    } elseif ($timeIn->lessThan($dutyStart) && $timeOut->greaterThan($dutyEnd)) {
        
        $totalHours = $dutyStart->diffInMinutes($dutyEnd) / 60;
    } else {
      
        $totalHours = $timeIn->diffInMinutes($timeOut) / 60;
    }

  
    $totalHours = round($totalHours, 2);



    
    $attendance->update([
        'total_hours' => $totalHours,
    ]);
}
session()->flash('success', 'Time out recorded successfully!');

        }else{
         
if ($attendance->time_in && $attendance->time_out) {
    $timeIn = Carbon::parse($attendance->time_in);
    $timeOut = Carbon::parse($attendance->time_out);
    $dutyStart = Carbon::parse($attendance->date . ' ' . $attendance->duty_start);
    $dutyEnd = Carbon::parse($attendance->date . ' ' . $attendance->duty_end);

    if ($timeIn->greaterThan($dutyStart) && $timeOut->lessThan($dutyEnd)) {
        
        $totalHours = $timeIn->diffInMinutes($timeOut) / 60;
    } elseif ($timeIn->lessThan($dutyStart) && $timeOut->lessThan($dutyEnd)) {
        
        $totalHours = $dutyStart->diffInMinutes($timeOut) / 60;
    } elseif ($timeIn->lessThan($dutyStart) && $timeOut->greaterThan($dutyEnd)) {
       
        $totalHours = $dutyStart->diffInMinutes($dutyEnd) / 60;
    } else {
       
        $totalHours = $timeIn->diffInMinutes($timeOut) / 60;
    }

    
    $totalHours = round($totalHours, 2);


   
    $attendance->update([
        'total_hours' => $totalHours,
    ]);
}
session()->flash('success', 'Time out recorded successfully!');


        }
 
        
    } else {
      
        
        session()->flash('info', 'You have already timed out.');
    }
    }

       }else{
       
     $currentDate = Carbon::now();
     $weekday = strtolower($currentDate->format('l'));
 
    
     $workSchedule = WorkSchedule::where('employee_id', $this->employee_id)->first();

     $attendance = AttendanceRecord::where('employee_id', $this->employee_id)
     ->whereDate('date', $currentDate->toDateString())
     ->first();
 
     if (!$workSchedule) {
         session()->flash('error', 'You have no work schedule for today');
         return;
     }
 
 
     $workStartTime = $workSchedule->{$weekday . '_in'};
     $workEndTime = $workSchedule->{$weekday . '_out'};
 
    
     if (!$workStartTime || !$workEndTime) {
         session()->flash('error', 'No work schedule for today.');
         return;
     }
 
     $currentTime = Carbon::now();
     $scheduledStartTime = Carbon::createFromFormat('H:i:s', $workStartTime);
 

       $minutesBeforeSchedule = $scheduledStartTime->diffInMinutes($currentTime);
       if($minutesBeforeSchedule < 120 )
       {

            
$currentTime = Carbon::now();
$currentDate = $currentTime->toDateString();
$yesterdayDate = $currentTime->copy()->subDay()->toDateString();

$attendance = AttendanceRecord::where('employee_id', $this->employee_id)
    ->where(function ($query) use ($currentDate, $yesterdayDate) {
        $query->whereDate('date', $currentDate)
              ->orWhereDate('date', $yesterdayDate);
    })
    ->latest('date')
    ->first();
       
    if (!$attendance->time_out) {
        try {
            $dutyStart = Carbon::createFromFormat('Y-m-d H:i:s', $attendance->date . ' ' . $attendance->duty_start);
            $timeIn = Carbon::parse($attendance->time_in);
            $currentTime = Carbon::now();
        } catch (\Exception $e) {
            session()->flash('error', 'Invalid time format detected.');
            return;
        }

      
    
        if ($currentTime->lt($dutyStart)) {
          
            $timeWorkedInMinutes = 0;
        } elseif ($timeIn->lt($dutyStart)) {
            
            $timeWorkedInMinutes = $dutyStart->diffInMinutes($currentTime);
        } else {
         
            $timeWorkedInMinutes = $timeIn->diffInMinutes($currentTime);
        }



      
        if ($timeWorkedInMinutes < 60) {
            session()->flash('error', 'You must work at least 1 hour before timing out.');
            return;
        }

    
        $attendance->update([
            'time_out' => $currentTime,
        ]);

        if($attendance->duty_start > $attendance->duty_end)
        {
          
if ($attendance->time_in && $attendance->time_out) {
    $timeIn = Carbon::parse($attendance->time_in);
    $timeOut = Carbon::parse($attendance->time_out);
    $dutyStart = Carbon::parse($attendance->date . ' ' . $attendance->duty_start);
    $attendanceDate = Carbon::parse($attendance->date)->addDay();
    $dutyEnd = Carbon::parse($attendanceDate->toDateString() . ' ' . $attendance->duty_end);

    if ($timeIn->greaterThan($dutyStart) && $timeOut->lessThan($dutyEnd)) {
       
        $totalHours = $timeIn->diffInMinutes($timeOut) / 60;
    } elseif ($timeIn->lessThan($dutyStart) && $timeOut->lessThan($dutyEnd)) {
       
        $totalHours = $dutyStart->diffInMinutes($timeOut) / 60;
    } elseif ($timeIn->lessThan($dutyStart) && $timeOut->greaterThan($dutyEnd)) {
       
        $totalHours = $dutyStart->diffInMinutes($dutyEnd) / 60;
    } else {
       
        $totalHours = $timeIn->diffInMinutes($timeOut) / 60;
    }

    $totalHours = round($totalHours, 2);



   
    $attendance->update([
        'total_hours' => $totalHours,
    ]);
}
session()->flash('success', 'Time out recorded successfully!');

        }else{
          
if ($attendance->time_in && $attendance->time_out) {
    $timeIn = Carbon::parse($attendance->time_in);
    $timeOut = Carbon::parse($attendance->time_out);
    $dutyStart = Carbon::parse($attendance->date . ' ' . $attendance->duty_start);
    $dutyEnd = Carbon::parse($attendance->date . ' ' . $attendance->duty_end);

    if ($timeIn->greaterThan($dutyStart) && $timeOut->lessThan($dutyEnd)) {
       
        $totalHours = $timeIn->diffInMinutes($timeOut) / 60;
    } elseif ($timeIn->lessThan($dutyStart) && $timeOut->lessThan($dutyEnd)) {
       
        $totalHours = $dutyStart->diffInMinutes($timeOut) / 60;
    } elseif ($timeIn->lessThan($dutyStart) && $timeOut->greaterThan($dutyEnd)) {
        
        $totalHours = $dutyStart->diffInMinutes($dutyEnd) / 60;
    } else {
       
        $totalHours = $timeIn->diffInMinutes($timeOut) / 60;
    }


    $totalHours = round($totalHours, 2);


  
    $attendance->update([
        'total_hours' => $totalHours,
    ]);
}
session()->flash('success', 'Time out recorded successfully!');


        }
    } else {
        
      

     $employee = EmployeeRecords::where('employee_id', $this->employee_id)->first();
     $latestCutoff = \App\Models\Cutoff::where('company_id', Auth::user()->company_id)
     ->latest('cutoff_id')
     ->first();
 
     $currentDate = Carbon::now()->toDateString(); 

     if ($latestCutoff) {
         $cutoffStart = Carbon::parse($latestCutoff->date_start)->toDateString(); 
         $cutoffEnd = Carbon::parse($latestCutoff->date_end)->toDateString(); 
     
         if ($currentDate < $cutoffStart || $currentDate > $cutoffEnd) {
             
              session()->flash('error', "Current date ($currentDate) is outside the cutoff range ($cutoffStart to $cutoffEnd).");
              return ;
         } 
     } else {
         
          session()->flash('error', 'No cutoff record found.');
          return ;
     }


    
     if ($workSchedule) {
         $dutyStart = $workSchedule->{$weekday . '_in'};
         $workEndTime = $workSchedule->{$weekday . '_out'};


         
         $currentDate = Carbon::now();
         if ($dutyStart) {
            $attendance = AttendanceRecord::create([
                'company_id' => Auth::user()->company_id,
                'employee_id' => $this->employee_id,
                'cutoff_id' => $latestCutoff->cutoff_id,
                'rate' => $employee->hourly_rate,
                'date' => $currentDate->toDateString(),
                'duty_start' => $dutyStart,
                'duty_end' => $workEndTime,
                'time_in' => $currentTime, 
                'status_id' => 1,
                'has_night_diff' => $employee->has_night_diff,
            ]);
            
            
            BreaktimeLog::create([
                'attendance_id' => $attendance->attendance_id,
                'total_hours' => '00:59:59',
                'field' => '',  
            ]);
             session()->flash('success', 'Time-in recorded successfully!');
         } else {
             session()->flash('error', 'No work schedule found for today.');
         }
     } else {
         session()->flash('error', 'You have no work schedule for today');
     }
    }


       }else{
        session()->flash('info', 'You have already timed out.');
       }
    }
   
        } else {

            
           
       
    
            $employee = EmployeeRecords::where('employee_id', $this->employee_id)->first();
            $latestCutoff = \App\Models\Cutoff::where('company_id', Auth::user()->company_id)
    ->latest('cutoff_id')
    ->first();

$currentDate = Carbon::now()->toDateString(); 

if ($latestCutoff) {
    $cutoffStart = Carbon::parse($latestCutoff->date_start)->toDateString(); 
    $cutoffEnd = Carbon::parse($latestCutoff->date_end)->toDateString();    

    if ($currentDate < $cutoffStart || $currentDate > $cutoffEnd) {
       
         session()->flash('error', "Current date ($currentDate) is outside the cutoff range ($cutoffStart to $cutoffEnd).");
         return ;
    } 
} else {
    
     session()->flash('error', 'No cutoff record found.');
     return ;
}
     
       

    
         
            if ($workSchedule) {
                $dutyStart = $workSchedule->{$weekday . '_in'};
                $workEndTime = $workSchedule->{$weekday . '_out'};

    
              
                $currentDate = Carbon::now();
                if ($dutyStart) {
                    $attendance = AttendanceRecord::create([
                        'company_id' => Auth::user()->company_id,
                        'employee_id' => $this->employee_id,
                        'cutoff_id' => $latestCutoff->cutoff_id,
                        'rate' => $employee->hourly_rate,
                        'date' => $currentDate->toDateString(),
                        'duty_start' => $dutyStart,
                        'duty_end' => $workEndTime,
                        'time_in' => $currentTime, 
                        'status_id' => 1,
                        'has_night_diff' => $employee->has_night_diff,
                    ]);
                    
                    
                    BreaktimeLog::create([
                        'attendance_id' => $attendance->attendance_id,
                        'total_hours' => '00:59:59',
                        'field' => '',  
                    ]);
                    session()->flash('success', 'Time-in recorded successfully!');
                } else {
                    session()->flash('error', 'No work schedule found for today.');
                }
            } else {
                session()->flash('error', 'You have no work schedule for today');
            }
        }
    
        
        $this->reset('employee_id');
    }
    

    

    

    public function render()
    {
        return view('livewire.attendance.attendance-page');
    }
}
