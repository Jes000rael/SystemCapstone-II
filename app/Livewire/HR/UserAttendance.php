<?php

namespace App\Livewire\HR;

use Livewire\Component;

use App\Models\AttendanceRecord;
use App\Models\Cutoff;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class UserAttendance extends Component
{
    
public $attendance, $cutoffs, $cut_off,$latest,$breakbutton='Take a break';

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

  
    if ($this->cut_off) {
        $this->loadAttendance($employee_id, $this->cut_off);
    } else {
    
        $latestCutoff = $this->cutoffs->first();
        $this->cut_off = $latestCutoff ? $latestCutoff->cutoff_id : null;
        
        if ($this->cut_off) {
            $this->loadAttendance($employee_id, $this->cut_off);
        } else {
          
            $this->attendance = collect(); 
        }
    }
}



    public function cutoffselect()
{
    $employee_id = Auth::user()->employee_id;

    if ($this->cut_off) {
   
        Session::put('selected_cut_off', $this->cut_off);

     
        $this->loadAttendance($employee_id, $this->cut_off);

        redirect()->intended('/admin/user/attendance');
        return;
    } else {
      
        $this->attendance = collect(); 
    }
}


private function loadAttendance($employee_id, $cutoffId)
{
  
    $this->attendance = AttendanceRecord::where('employee_id', $employee_id)
        ->where('cutoff_id', $cutoffId)
        ->orderBy('attendance_id', 'desc') 
        ->get();

    $companyId = Auth::user()->company_id;


        $this->cutoffs = Cutoff::where('company_id', $companyId)
        ->whereHas('attendanceRecords', function ($query) {
            $query->whereNotNull('cutoff_id');
        })
        ->orderBy('cutoff_id', 'desc')
        ->get();

        
}



    public function render()
    {
        return view('livewire.h-r.user-attendance');
    }
}
