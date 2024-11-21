<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Company;
use App\Models\EmploymentStatus;
class AddStatus extends Component
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
    public function add_status()
    {
       
        $this->validate();
       
        EmploymentStatus::create([
            'description' => $this->description,
            'company_id' => $this->company_id
        ]);

        $this->dispatch('departmentAdded');
        
        $this->reset(['description','company_id']);
        return redirect()->intended('/company/employment')->with('employment-add', 'Successfully');
    
    }
    public function render()
    {
        return view('livewire.add-status');
    }
}
