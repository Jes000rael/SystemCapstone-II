<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;
use App\Models\EmployeeRecords;
use App\Models\Department;

class CompanyEnop extends Component
{

    public $companies;
    public $companyCount;
    public $firstname;
    public $lastname,$company,$job;

    public function mount()
    {
        $this->CompaniesWithEmployeeCount();
        $this->companyCount = Company::count();

if (Auth::check()) {
                $this->firstname = Auth::user();
                $this->lastname = Auth::user()->last_name;
                $this->company = Company::where('company_id', Auth::user()->company_id)->first();
                $this->job = Department::where('department_id', Auth::user()->department_id)->first();

            } else {
               
            }

        
      

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
