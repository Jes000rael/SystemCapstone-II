<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Department;

use App\Models\Company;
class DepartmentEdit extends Component
{
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
        
        
       $this->company = Company::all();
      }
      
      
      
      public function editDepartment()
      {
          $this->validate();
      
          $department = Department::findOrFail($this->department_id);
          $department->update([
              'company_id' => $this->company_id,
              'description' => $this->description,
          ]);
      
          session()->flash('message', 'Department updated successfully.');
      
          // Reset modal fields and close modal
          $this->resetFields();
          $this->dispatchBrowserEvent('close-modal');
      }
      
      
    public function render()
    {
        return view('livewire.department-edit');
    }
}
