<?php

namespace App\Livewire\HR;

use Livewire\Component;
use App\Models\Shift;
use Illuminate\Support\Facades\Auth;
class AddShift extends Component
{

public $description='';
    public $companyId;
    protected $rules = [
        'description' => 'required',
    ];


    public function add_shift()
    {
        $this->validate();
       
        $this->companyId = Auth::user()->company_id;

        Shift::create([
            'description' => $this->description,
            'company_id' => $this->companyId,
        ]);
        
        $this->reset(['description']);
        return redirect()->intended('/admin/shifts')->with('shift-add', 'Successfully');
        
  
    }
    public function render()
    {
        return view('livewire.h-r.add-shift');
    }
}
