<?php

namespace App\Livewire\HR;

use Livewire\Component;
use App\Models\EmploymentStatus;
use Illuminate\Support\Facades\Auth;


class EmployeeStatuss extends Component
{
    public $employment;

    public function mount()
    {
      
        $companyId = Auth::user()->company_id ; 
            $this->employment = EmploymentStatus::where('company_id', $companyId)->get();
      
    }
    public function render()
    {
        return view('livewire.h-r.employee-status');
    }
}
