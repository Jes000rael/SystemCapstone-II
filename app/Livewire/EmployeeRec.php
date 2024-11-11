<?php

namespace App\Livewire;

use Livewire\Component;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Models\EmployeeRecords;
use App\Models\Company;

class EmployeeRec extends Component
{

    public $employees;

    public function mount()
    {
    
        $this->employees =  EmployeeRecords::with('company','work_sched','deduction','meritLog','absence','shift','department','jobtitle','seniorityLevel','employmentStatus')->get();
    }
 
    public function render()
    {
        return view('livewire.employee-rec');
    }
}
