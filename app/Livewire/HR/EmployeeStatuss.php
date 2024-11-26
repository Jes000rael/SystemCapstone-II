<?php

namespace App\Livewire\HR;

use Livewire\Component;
use App\Models\EmploymentStatus;
use Illuminate\Support\Facades\Auth;


class EmployeeStatuss extends Component
{
    public $employment;

 
    public function mount()
    {
      
       $this->updateEmployment();
      
    }

    public function updateEmployment()
    {
        $companyId = Auth::user()->company_id ; 
        $this->employment = EmploymentStatus::where('company_id', $companyId)->get();
    }

    public function deleteEmployment($employmentID)

{

    if ($employmentID) {
        EmploymentStatus::find($employmentID)->delete();
    
        $this->updateEmployment();

        return redirect()->intended('/admin/employee-status')->with('employment-deleted', 'Successfully');
        // $this->dispatch('company-deleted', ['message' => 'Company Deleted successfully!']);

       
    }
}
    public function render()
    {
        return view('livewire.h-r.employee-status');
    }
}
