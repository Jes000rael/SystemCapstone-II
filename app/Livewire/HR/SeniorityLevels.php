<?php

namespace App\Livewire\HR;

use Livewire\Component;
use App\Models\SeniorityLevel;
use Illuminate\Support\Facades\Auth;
class SeniorityLevels extends Component
{
    public $seniority;

    public function mount()
    {
      
        $companyId = Auth::user()->company_id ; 
            $this->seniority = SeniorityLevel::where('company_id', $companyId)->get();
      
    }
    public function render()
    {
        return view('livewire.h-r.seniority-level');
    }
}
