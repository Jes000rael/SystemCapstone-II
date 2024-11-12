<?php

namespace App\Livewire\HR;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;
use App\Models\EmployeeRecords;

class Dashboard extends Component
{
    public $employeeCount,$companyName;
    

    public function mount()
    {
        $companyId = Auth::user()->company_id ;

        $company = Company::find($companyId);

        $this->companyName = $company ? $company->description : 'Company not found';

        $this->employeeCount = EmployeeRecords::where('company_id', $companyId)
        ->where('department_id', '!=', 1) 
        ->count();
      
    

    }
    public function render()
    {
    
        return view('livewire.h-r.dashboard');
    }
}
