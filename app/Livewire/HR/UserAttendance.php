<?php

namespace App\Livewire\HR;

use Livewire\Component;
use App\Models\AttendanceRecord;
use App\Models\Cutoff;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;


class UserAttendance extends Component
{
    public $attendance, $cutoffs, $cut_off, $latest;


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

    public function saveBreakTime($newBreakTime)
    {
        // Save the updated break time to the latest attendance record
        if ($this->latest) {
            $this->latest->total_break = $newBreakTime;
            $this->latest->save();
        }
    }
  
    public function render()
    {
        return view('livewire.h-r.user-attendance');
    }
}
