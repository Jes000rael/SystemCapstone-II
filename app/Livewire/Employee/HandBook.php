<?php

namespace App\Livewire\Employee;

use Livewire\Component;
use App\Models\Handbooks;
use Illuminate\Support\Facades\Auth;
class HandBook extends Component
{


 public $hand;
    

    public function mount()
    {
      
        $this->updatehand();
    
      
    }

public function updatehand()
    {
        $companyId = Auth::user()->company_id ; 
        $this->hand = Handbooks::where('company_id', $companyId)->get();
    }
    public function render()
    {
        return view('livewire.employee.hand-book');
    }
}
