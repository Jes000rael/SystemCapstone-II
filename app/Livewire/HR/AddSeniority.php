<?php

namespace App\Livewire\HR;

use Livewire\Component;
use App\Models\SeniorityLevel;
use Illuminate\Support\Facades\Auth;
class AddSeniority extends Component
{


public $description='';
    public $companyId;
    protected $rules = [
        'description' => 'required',
    ];


    public function add_seniority()
    {
        $this->validate();
       
        $this->companyId = Auth::user()->company_id;

        SeniorityLevel::create([
            'description' => $this->description,
            'company_id' => $this->companyId,
        ]);
        
        $this->reset(['description']);
        return redirect()->intended('admin/seniority')->with('seniority-add', 'Successfully');
        
  
    }
    public function render()
    {
        return view('livewire.h-r.add-seniority');
    }
}
