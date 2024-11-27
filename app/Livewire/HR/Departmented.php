<?php

namespace App\Livewire\HR;

use Livewire\Component;
use App\Models\Department;
use Illuminate\Support\Facades\Auth;


class Departmented extends Component
{
    public $description='';
    public $department,$companyId;
    protected $rules = [
        'description' => 'required',
    ];

    public function mount()
    {
        $this->updateDepartments();
      

    }

    public function updateDepartments()
{
    $this->companyId = Auth::user()->company_id ; 
    $departmentId = Auth::user()->department_id ;
  

    if($this->companyId === 1){
        if($departmentId === 2){
            $this->department = Department::where('company_id', $this->companyId)
            ->whereNotIn('department_id', [1, 2])
            ->get();
        }
       
    }else{
        $this->department = Department::where('company_id', $this->companyId)->where('department_id', '!=', 2)
        ->get();
    }
}
public function deleteDepartment($DepartmentId)

{

    if ($DepartmentId) {
    Department::find($DepartmentId)->delete();
    
        $this->updateDepartments();

        return redirect()->intended('/admin/department')->with('department-deleted', 'Successfully');
        // $this->dispatch('company-deleted', ['message' => 'Company Deleted successfully!']);

       
    }
}
 

  
    public function render()
    {
        return view('livewire.h-r.departmented');
    }
}
