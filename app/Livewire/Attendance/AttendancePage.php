<?php

namespace App\Livewire\Attendance;

use Livewire\Component;


use App\Models\AttendanceRecord;
use App\Models\WorkSchedule; 
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Crypt;


class AttendancePage extends Component
{
    public $employee_id;

    public function empAttendance()
    {
        // Validate the employee ID
        $this->validate([
            'employee_id' => 'required|exists:employee_records,employee_id',
        ]);

        // Get the current date and weekday (e.g., Monday, Tuesday)
        $currentDate = Carbon::now();
        $weekday = strtolower($currentDate->format('l')); // This will return day of the week (e.g., 'Monday', 'Tuesday')

        // Get the employee's work schedule for today
        $workSchedule = WorkSchedule::where('employee_id', $this->employee_id)
            ->first(); // Get the first work schedule (assuming there’s only one active schedule)

        if (!$workSchedule) {
            session()->flash('error', 'No work schedule found for this employee.');
            return;
        }

        // Check if the employee has a schedule for the current day (e.g., Monday, Tuesday, etc.)
        $workStartTime = $workSchedule->{$weekday . '_in'}; // Get the start time for the day
        $workEndTime = $workSchedule->{$weekday . '_out'}; // Get the end time for the day

        // If there's no schedule for that day, prevent time-in
        if (!$workStartTime || !$workEndTime) {
            session()->flash('error', 'No work schedule for today.');
            return;
        }

        // Check if the current time is within the working hours
        $currentTime = Carbon::now()->format('H:i:s'); // Get current time in 'H:i:s' format

        if ($currentTime < $workStartTime || $currentTime > $workEndTime) {
            session()->flash('error', 'You cannot mark attendance outside of your scheduled work hours.');
            return;
        }

        // Check if the employee already has an attendance record for today
        $attendance = AttendanceRecord::where('employee_id', $this->employee_id)
            ->whereDate('date', $currentDate->toDateString())
            ->first();

        if ($attendance) {
            // If time_in exists but no time_out, mark time_out
            if (!$attendance->time_out) {
                $attendance->update([
                    'time_out' => $currentDate, // Mark time_out when the employee leaves
                ]);

                session()->flash('success', 'Time out recorded successfully!');
            } else {
                session()->flash('info', 'Attendance already recorded for today.');
            }
        } else {
            // Create a new attendance record with time_in
            AttendanceRecord::create([
                'employee_id' => $this->employee_id,
                'date' => $currentDate->toDateString(),
                'time_in' => $currentDate,
            ]);

            session()->flash('success', 'Time in recorded successfully!');
        }

        // Reset the input field after submitting
        $this->reset('employee_id');
    }

    public function render()
    {
        return view('livewire.attendance.attendance-page');
    }
}
