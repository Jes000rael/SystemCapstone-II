<?php

namespace App\Livewire\HR;

use Livewire\Component;
use App\Models\Handbooks;
use Illuminate\Support\Facades\Auth;
class AddHandbooks extends Component
{
 public $description='';
 public $link='';
    public $companyId;
    protected $rules = [
        'description' => 'required',
        'link' => 'required|url',
    ];


    public function add_handbooks()
    {
        $this->validate();
       
        $this->companyId = Auth::user()->company_id;

        Handbooks::create([
            'description' => $this->description,
            'link' => $this->link,
            'company_id' => $this->companyId,
        ]);
        
        $this->reset(['description','link']);
        return redirect()->intended('/admin/hand-book')->with('handbook-add', 'Successfully');
  
    }
    public function render()
    {
        return view('livewire.h-r.add-handbooks');
    }
}
