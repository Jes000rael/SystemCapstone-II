<?php

namespace App\Livewire\HR;

use Livewire\Component;
use App\Models\EmploymentStatus;
use Illuminate\Support\Facades\Auth;
class AddEmploystat extends Component
{

public $description='';
    public $companyId;
    protected $rules = [
        'description' => 'required',
    ];


    public function add_employment()
    {
        $this->validate();
       
        $this->companyId = Auth::user()->company_id;

        EmploymentStatus::create([
            'description' => $this->description,
            'company_id' => $this->companyId,
        ]);
        
        $this->reset(['description']);
        return redirect()->intended('admin/employee-status')->with('employment-add', 'Successfully');
        
  
    }
    public function render()
    {
        return view('livewire.h-r.add-employstat');
    }
}
