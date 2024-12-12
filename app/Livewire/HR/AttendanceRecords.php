<?php

namespace App\Livewire\HR;

use Livewire\Component;

use App\Models\AttendanceRecord;
use App\Models\Cutoff;
use Illuminate\Support\Facades\Auth;
class AttendanceRecords extends Component
{


 public $attendance;
    

    public function mount()
    {
      
        $this->updateAttendance();
    
      
    }

public function updateAttendance()
    {
        $companyId = Auth::user()->company_id ;
        $cutoff = Cutoff::where('company_id', $companyId)
    ->orderBy('cutoff_id', 'desc')
    ->first();

    if ($cutoff) {
        $this->attendance = AttendanceRecord::where('company_id', $companyId)
            ->where('cutoff_id', $cutoff->cutoff_id)
            ->orderBy('attendance_id', 'desc') 
            ->get();
    } else {
        $this->attendance = collect();
    }
    }




    public function render()
    {
        return view('livewire.h-r.attendance-record');
    }
}
