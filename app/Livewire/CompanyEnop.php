<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;
use App\Models\EmployeeRecords;

class CompanyEnop extends Component
{

    public $companies;
    public $companyCount;

    public function mount()
    {
        $this->CompaniesWithEmployeeCount();
        $this->companyCount = Company::count();

    }

    public function CompaniesWithEmployeeCount()
    {
        $this->companies = Company::withCount(['employees' => function ($query) {
            $query->where('department_id', '!=', 1);
        }])->get();
    }
   
    public function render()
    {
       
        return view('livewire.company-enop');
    }
}
