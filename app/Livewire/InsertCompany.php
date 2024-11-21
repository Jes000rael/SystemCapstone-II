<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Company;

class InsertCompany extends Component
{
    public $description='';
    public $timezone='';

 
    protected $rules = [
        'description' => 'required',
        'timezone' => 'required',
        
        
    ];

    public function add_company()
    {
        $this->validate();
  

        Company::create([
            'description' => $this->description,
            'timezone' => $this->timezone
          
         
        ]);
       
        $this->dispatch('loadCompany');
        $this->reset(['description','timezone']);
        return redirect()->intended('/company/add_company')->with('company-add', 'Successfully');
    }
    public function render()
    {
        return view('livewire.insert-company');
    }
}
