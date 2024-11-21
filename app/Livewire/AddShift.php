<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Company;
use App\Models\Shift;
class AddShift extends Component
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
    public function add_shift()
    {
       
        $this->validate();
       
        Shift::create([
            'description' => $this->description,
            'company_id' => $this->company_id
        ]);

        $this->dispatch('departmentAdded');
        
        $this->reset(['description','company_id']);
        return redirect()->intended('/company/shift')->with('shift-add', 'Successfully');
    
    }
    public function render()
    {
        return view('livewire.add-shift');
    }
}
