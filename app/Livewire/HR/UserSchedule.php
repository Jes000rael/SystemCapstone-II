<?php

namespace App\Livewire\HR;

use Livewire\Component;
use App\Models\WorkSchedule;
use Illuminate\Support\Facades\Auth;
class UserSchedule extends Component
{
    public $employee;
    public function mount()
    {
       
        $employeeId = Auth::user()->employee_id ; 
        $this->employee = WorkSchedule::where('employee_id', $employeeId)->get();

    }
    public function render()
    {
        return view('livewire.h-r.user-schedule');
    }
}
