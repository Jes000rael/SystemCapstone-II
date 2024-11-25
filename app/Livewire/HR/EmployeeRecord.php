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
        $this->updateEmployee();

    }


    public function updateEmployee()
    {
        $companyId = Auth::user()->company_id;
        $this->employees = EmployeeRecords::with(
            'company', 'work_sched', 'deduction', 'meritLog', 'absence', 
            'shift', 'department', 'jobtitle', 'seniorityLevel', 'employmentStatus'
        )
        ->where('company_id', $companyId)
        ->where('department_id', '!=', 1) 
        ->get();
    }
    public function deleteEmployee($employeeId)
    
    {
    
        if ($employeeId) {
            EmployeeRecords::find($employeeId)->delete();
        
            $this->updateEmployee();
    
            return redirect()->intended('admin/employee_records')->with('employee-deleted', 'Successfully');
            // $this->dispatch('company-deleted', ['message' => 'Company Deleted successfully!']);
    
           
        }
    }
 
    public function render()
    {
        return view('livewire.h-r.employee-record');
    }
}

