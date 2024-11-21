<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Company;
use App\Models\SeniorityLevel;

class AddSeniority extends Component
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
    public function add_seniority()
    {
       
        $this->validate();
       
        SeniorityLevel::create([
            'description' => $this->description,
            'company_id' => $this->company_id
        ]);

        $this->dispatch('departmentAdded');
        
        $this->reset(['description','company_id']);
        return redirect()->intended('/company/seniority')->with('seniority-add', 'Successfully');
    
    }
    public function render()
    {
        return view('livewire.add-seniority');
    }
}
