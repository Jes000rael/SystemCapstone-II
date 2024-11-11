<?php
namespace App\Livewire\HR;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Models\EmployeeRecords;
use App\Models\Company;


class EmployeeRecord extends Component
{
    public $employees;

    public function mount()
    {
         $companyId = Auth::user()->company_id;
        $this->employees =  EmployeeRecords::with('company','work_sched','deduction','meritLog','absence','shift','department','jobtitle','seniorityLevel','employmentStatus')->where('company_id', $companyId)->get();
    }
 
    public function render()
    {
        return view('livewire.h-r.employee-record');
    }
}

