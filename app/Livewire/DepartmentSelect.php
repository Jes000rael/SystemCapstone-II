<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Department;

use App\Models\Company;

class DepartmentSelect extends Component
{

    public $department;
    public $company;
    public $company_id;
    public $department_id;
    public $description;
      protected $listeners = ['departmentAdded' => 'updateDepartments'];
      protected $rules =[
        'description' => 'required',
        'company_id'=> 'required|exists:companies,company_id'
      ];

    public function mount()
{
    $this->updateDepartments();
  
 $this->company = Company::all();
}

public function updateDepartments()
{
    $this->department = Department::whereNotIn('department_id', [1, 2,3])->get();
}
public function deleteDepartment($DepartmentId)

{

    if ($DepartmentId) {
    Department::find($DepartmentId)->delete();
    
        $this->updateDepartments();

        return redirect()->intended('/company/department')->with('department-deleted', 'Successfully');
        // $this->dispatch('company-deleted', ['message' => 'Company Deleted successfully!']);

       
    }
}




  

    public function render()
    {
        return view('livewire.department-select');
    }
}
