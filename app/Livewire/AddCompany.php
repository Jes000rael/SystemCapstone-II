<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Company;

class AddCompany extends Component
{

    public $description='';
    public $company;
    protected $rules = [
        'description' => 'required',
    ];
    public function mount()
    {
      
                $this->company = Company::all();
           

    }
    public function add_company()
    {
        $this->validate();

        Company::create([
            'description' => $this->description
         
        ]);
        $this->reset(['description']);
    }
    public function render()
    {
        return view('livewire.add-company');
    }
}
