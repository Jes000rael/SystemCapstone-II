<?php

namespace App\Livewire\Attendance;

use Livewire\Component;


use App\Models\AttendanceRecord;
use App\Models\WorkSchedule; 
use App\Models\EmployeeRecords; 
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Crypt;


class AttendancePage extends Component
{
    public $employee_id;

    public function empAttendance()
    {
        // Validate the employee_id input
        $this->validate([
            'employee_id' => 'required|exists:employee_records,employee_id',
        ]);
    
        // Get the current date and the weekday (e.g., 'monday', 'tuesday', etc.)
        $currentDate = Carbon::now();
        $weekday = strtolower($currentDate->format('l'));
    
        // Retrieve the work schedule for the employee
        $workSchedule = WorkSchedule::where('employee_id', $this->employee_id)->first();
    
        // Check if the work schedule exists
        if (!$workSchedule) {
            session()->flash('error', 'You have no work schedule for today');
            return;
        }
    
        // Get the scheduled start and end times for today
        $workStartTime = $workSchedule->{$weekday . '_in'};
        $workEndTime = $workSchedule->{$weekday . '_out'};
    
        // Check if the work start and end times are available
        if (!$workStartTime || !$workEndTime) {
            session()->flash('error', 'No work schedule for today.');
            return;
        }
    
        $currentTime = Carbon::now();
        $scheduledStartTime = Carbon::createFromFormat('H:i:s', $workStartTime);
    
        // Check if the employee has already marked time-out for today
        $attendance = AttendanceRecord::where('employee_id', $this->employee_id)
            ->whereDate('date', $currentDate->toDateString())
            ->first();
    
        if ($attendance) {
            // If time-out is already recorded, we do not need to check lateness
            if ($attendance->time_out) {
                session()->flash('info', 'You are already time out.');
                return;
            }
        }
    
        // Check if the employee is late and has not yet marked time-out
        if ($currentTime > $scheduledStartTime && !$attendance) {
            // Calculate how much time the employee is late
            $latenessDuration = $currentTime->diff($scheduledStartTime);
    
            // Format the lateness duration
            $lateHours = $latenessDuration->h;
            $lateMinutes = $latenessDuration->i;
            $lateSeconds = $latenessDuration->s;
    
            $latenessMessage = 'You are late! Your scheduled start time was ' . $scheduledStartTime->format('g:i A') . '. Your ';
    
            if ($lateHours > 0) {
                $latenessMessage .= $lateHours . ' hour' . ($lateHours > 1 ? 's' : '') . ' and ';
            }
    
            if ($lateMinutes > 0) {
                $latenessMessage .= $lateMinutes . ' minute' . ($lateMinutes > 1 ? 's' : '') . ' and ';
            }
    
            $latenessMessage .= $lateSeconds . ' second' . ($lateSeconds > 1 ? 's' : '') . ' late.';
    
            // Flash the lateness message
            session()->flash('error', $latenessMessage);
        }
                   // Check if the employee has already marked time_in for today or the previous day's night shift
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
     // Get the current date and the weekday (e.g., 'monday', 'tuesday', etc.)
     $currentDate = Carbon::now();
     $weekday = strtolower($currentDate->format('l'));
 
     // Retrieve the work schedule for the employee
     $workSchedule = WorkSchedule::where('employee_id', $this->employee_id)->first();

     $attendance = AttendanceRecord::where('employee_id', $this->employee_id)
     ->whereDate('date', $currentDate->toDateString())
     ->first();
 
     // Check if the work schedule exists
     if (!$workSchedule) {
         session()->flash('error', 'You have no work schedule for today');
         return;
     }
 
     // Get the scheduled start and end times for today
     $workStartTime = $workSchedule->{$weekday . '_in'};
     $workEndTime = $workSchedule->{$weekday . '_out'};
 
     // Check if the work start and end times are available
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
         //   session()->flash('info', 'You are ' . $minutesBeforeSchedule . ' minutes before your scheduled start time.');
         try {
            $dutyStart = Carbon::createFromFormat('Y-m-d H:i:s', $attendance->date . ' ' . $attendance->duty_start);
            $timeIn = Carbon::parse($attendance->time_in);
            $currentTime = Carbon::now();
        } catch (\Exception $e) {
            session()->flash('error', 'Invalid time format detected.');
            return;
        }

      
        // Calculate time worked
        if ($currentTime->lt($dutyStart)) {
            // Current time is earlier than the duty start time, no work has been done
            $timeWorkedInMinutes = 0;
        } elseif ($timeIn->lt($dutyStart)) {
            // Time in is earlier than duty start, use duty start as the base
            $timeWorkedInMinutes = $dutyStart->diffInMinutes($currentTime);
        } else {
            // Time in is on or after duty start
            $timeWorkedInMinutes = $timeIn->diffInMinutes($currentTime);
        }

        

        // Validate minimum work period
        if ($timeWorkedInMinutes < 60) {
            session()->flash('error', 'You must work at least 1 hour before timing out.');
            return;
        }


         // If no attendance exists, create a new one
         $latestCutoff = \App\Models\Cutoff::where('company_id', Auth::user()->company_id)
         ->latest('cutoff_id')
         ->first();

     $employee = EmployeeRecords::where('employee_id', $this->employee_id)->first();
 $currentDate = Carbon::now();


     // Get the duty start time for today
     if ($workSchedule) {
         $dutyStart = $workSchedule->{$weekday . '_in'};
         $workEndTime = $workSchedule->{$weekday . '_out'};


         // Check if duty start time exists
         if ($dutyStart) {
             AttendanceRecord::create([
                 'employee_id' => $this->employee_id,
                 'cutoff_id' => $latestCutoff->cutoff_id,
                 'rate' => $employee->hourly_rate,
                 'date' => $currentDate->toDateString(),
                 'duty_start' => $dutyStart,
                 'duty_end' => $workEndTime,
                 'time_in' => $currentTime, // Set time_in to now
                 'status_id' => 1,
                 'has_night_diff' => $employee->has_night_diff,
             ]);
             session()->flash('success', 'Time-in recorded successfully!');
         } else {
             session()->flash('error', 'No work schedule found for today.');
         }
     } else {
         session()->flash('error', 'You have no work schedule for today');
     }
       }else{
         // If no attendance exists, create a new one
         $latestCutoff = \App\Models\Cutoff::where('company_id', Auth::user()->company_id)
         ->latest('cutoff_id')
         ->first();

     $employee = EmployeeRecords::where('employee_id', $this->employee_id)->first();
 $currentDate = Carbon::now();


     // Get the duty start time for today
     if ($workSchedule) {
         $dutyStart = $workSchedule->{$weekday . '_in'};
         $workEndTime = $workSchedule->{$weekday . '_out'};


         // Check if duty start time exists
         if ($dutyStart) {
             AttendanceRecord::create([
                 'employee_id' => $this->employee_id,
                 'cutoff_id' => $latestCutoff->cutoff_id,
                 'rate' => $employee->hourly_rate,
                 'date' => $currentDate->toDateString(),
                 'duty_start' => $dutyStart,
                 'duty_end' => $workEndTime,
                 'time_in' => $currentTime, // Set time_in to now
                 'status_id' => 1,
                 'has_night_diff' => $employee->has_night_diff,
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

              // Check if the employee has already marked time_in for today or the previous day's night shift
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
         // If attendance exists and no time-out is recorded, validate time-out
    if (!$attendance->time_out) {
        try {
            $dutyStart = Carbon::createFromFormat('Y-m-d H:i:s', $attendance->date . ' ' . $attendance->duty_start);
            $timeIn = Carbon::parse($attendance->time_in);
            $currentTime = Carbon::now();
        } catch (\Exception $e) {
            session()->flash('error', 'Invalid time format detected.');
            return;
        }

      
        // Calculate time worked
        if ($currentTime->lt($dutyStart)) {
            // Current time is earlier than the duty start time, no work has been done
            $timeWorkedInMinutes = 0;
        } elseif ($timeIn->lt($dutyStart)) {
            // Time in is earlier than duty start, use duty start as the base
            $timeWorkedInMinutes = $dutyStart->diffInMinutes($currentTime);
        } else {
            // Time in is on or after duty start
            $timeWorkedInMinutes = $timeIn->diffInMinutes($currentTime);
        }



        // Validate minimum work period
        if ($timeWorkedInMinutes < 60) {
            session()->flash('error', 'You must work at least 1 hour before timing out.');
            return;
        }

        // Record time-out
        $attendance->update([
            'time_out' => $currentTime,
        ]);
        
        session()->flash('success', 'Time out recorded successfully!');
    } else {
      
        
        session()->flash('info', 'You have already timed out.');
    }
    }

       }else{
        // Get the current date and the weekday (e.g., 'monday', 'tuesday', etc.)
     $currentDate = Carbon::now();
     $weekday = strtolower($currentDate->format('l'));
 
     // Retrieve the work schedule for the employee
     $workSchedule = WorkSchedule::where('employee_id', $this->employee_id)->first();

     $attendance = AttendanceRecord::where('employee_id', $this->employee_id)
     ->whereDate('date', $currentDate->toDateString())
     ->first();
 
     // Check if the work schedule exists
     if (!$workSchedule) {
         session()->flash('error', 'You have no work schedule for today');
         return;
     }
 
     // Get the scheduled start and end times for today
     $workStartTime = $workSchedule->{$weekday . '_in'};
     $workEndTime = $workSchedule->{$weekday . '_out'};
 
     // Check if the work start and end times are available
     if (!$workStartTime || !$workEndTime) {
         session()->flash('error', 'No work schedule for today.');
         return;
     }
 
     $currentTime = Carbon::now();
     $scheduledStartTime = Carbon::createFromFormat('H:i:s', $workStartTime);
 

       $minutesBeforeSchedule = $scheduledStartTime->diffInMinutes($currentTime);
       if($minutesBeforeSchedule < 120 )
       {

               // Check if the employee has already marked time_in for today or the previous day's night shift
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
         // If attendance exists and no time-out is recorded, validate time-out
    if (!$attendance->time_out) {
        try {
            $dutyStart = Carbon::createFromFormat('Y-m-d H:i:s', $attendance->date . ' ' . $attendance->duty_start);
            $timeIn = Carbon::parse($attendance->time_in);
            $currentTime = Carbon::now();
        } catch (\Exception $e) {
            session()->flash('error', 'Invalid time format detected.');
            return;
        }

      
        // Calculate time worked
        if ($currentTime->lt($dutyStart)) {
            // Current time is earlier than the duty start time, no work has been done
            $timeWorkedInMinutes = 0;
        } elseif ($timeIn->lt($dutyStart)) {
            // Time in is earlier than duty start, use duty start as the base
            $timeWorkedInMinutes = $dutyStart->diffInMinutes($currentTime);
        } else {
            // Time in is on or after duty start
            $timeWorkedInMinutes = $timeIn->diffInMinutes($currentTime);
        }



        // Validate minimum work period
        if ($timeWorkedInMinutes < 60) {
            session()->flash('error', 'You must work at least 1 hour before timing out.');
            return;
        }

        // Record time-out
        $attendance->update([
            'time_out' => $currentTime,
        ]);
        
        session()->flash('success', 'Time out recorded successfully!');
    } else {
        
         // If no attendance exists, create a new one
         $latestCutoff = \App\Models\Cutoff::where('company_id', Auth::user()->company_id)
         ->latest('cutoff_id')
         ->first();

     $employee = EmployeeRecords::where('employee_id', $this->employee_id)->first();
 $currentDate = Carbon::now();


     // Get the duty start time for today
     if ($workSchedule) {
         $dutyStart = $workSchedule->{$weekday . '_in'};
         $workEndTime = $workSchedule->{$weekday . '_out'};


         // Check if duty start time exists
         if ($dutyStart) {
             AttendanceRecord::create([
                 'employee_id' => $this->employee_id,
                 'cutoff_id' => $latestCutoff->cutoff_id,
                 'rate' => $employee->hourly_rate,
                 'date' => $currentDate->toDateString(),
                 'duty_start' => $dutyStart,
                 'duty_end' => $workEndTime,
                 'time_in' => $currentTime, // Set time_in to now
                 'status_id' => 1,
                 'has_night_diff' => $employee->has_night_diff,
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

            
            // If no attendance exists, create a new one
            $latestCutoff = \App\Models\Cutoff::where('company_id', Auth::user()->company_id)
                ->latest('cutoff_id')
                ->first();
    
            $employee = EmployeeRecords::where('employee_id', $this->employee_id)->first();
        $currentDate = Carbon::now();

    
            // Get the duty start time for today
            if ($workSchedule) {
                $dutyStart = $workSchedule->{$weekday . '_in'};
                $workEndTime = $workSchedule->{$weekday . '_out'};

    
                // Check if duty start time exists
                if ($dutyStart) {
                    AttendanceRecord::create([
                        'company_id' =>Auth::user()->company_id,
                        'employee_id' => $this->employee_id,
                        'cutoff_id' => $latestCutoff->cutoff_id,
                        'rate' => $employee->hourly_rate,
                        'date' => $currentDate->toDateString(),
                        'duty_start' => $dutyStart,
                        'duty_end' => $workEndTime,
                        'time_in' => $currentTime, // Set time_in to now
                        'status_id' => 1,
                        'has_night_diff' => $employee->has_night_diff,
                    ]);
                    session()->flash('success', 'Time-in recorded successfully!');
                } else {
                    session()->flash('error', 'No work schedule found for today.');
                }
            } else {
                session()->flash('error', 'You have no work schedule for today');
            }
        }
    
        // Reset the employee ID for the next input
        $this->reset('employee_id');
    }
    

    

    

    public function render()
    {
        return view('livewire.attendance.attendance-page');
    }
}
