<?php

namespace App\Livewire\HR;

use Livewire\Component;
use App\Models\Shift;
use Illuminate\Support\Facades\Auth;

class Shiftss extends Component
{
    public $shift;

    public function mount()
    {
      
        $companyId = Auth::user()->company_id ; 
            $this->shift = Shift::where('company_id', $companyId)->get();
      
    }
    public function render()
    {
        return view('livewire.h-r.shifts');
    }
}
