<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Department;
use App\Models\Company;

class AddDepartment extends Component
{


    public $description='';
    public $company_id='';
    public $company;
    protected $rules = [
        'description' => 'required',
        'company_id'=> 'required'
    ];

    public function mount()
    {

            $this->company = Company::all();

    }
    public function add_department()
    {
       
        $this->validate();
       
        Department::create([
            'description' => $this->description,
            'company_id' => $this->company_id
        ]);

        $this->dispatch('departmentAdded');

        
        $this->reset(['description','company_id']);
      
    
        
  
    }

    public function render()
    {
        return view('livewire.add-department');
    }
}
