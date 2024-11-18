<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Department;


class DepartmentSelect extends Component
{

    public $department;
protected $listeners = ['departmentAdded' => 'updateDepartments'];



    public function mount()
{
    $this->updateDepartments();
}

public function updateDepartments()
{
    $this->department = Department::whereNotIn('department_id', [1, 2])->get();
}



  

    public function render()
    {
        return view('livewire.department-select');
    }
}
