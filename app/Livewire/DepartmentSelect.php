<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Department;
use App\Models\Company;

class DepartmentSelect extends Component
{
    public $description='';
    public $company_id='';
    public $department,$company;
    protected $rules = [
        'description' => 'required',
        'company_id'=> 'required'
    ];

    public function mount()
    {

        $this->department = Department::whereNotIn('department_id', [1, 2])->get();
            $this->company = Company::all();

    }
    public function add_department()
    {
       
        $this->validate();
       
        Department::create([
            'description' => $this->description,
            'company_id' => $this->company_id
        ]);

        
        $this->reset(['description','company_id']);
      
    
        
  
    }

  

    public function render()
    {
        return view('livewire.department-select');
    }
}
