<?php

namespace App\Livewire\HR;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;
use App\Models\Department;
use App\Models\EmployeeRecords;
use App\Models\Announcement;
use App\Models\Payslip;

use App\Models\Cutoff;


class Dashboard extends Component
{
    public $employeeCount,$companyName,$employeeCountHR,$employeeCountemp;
    public $announce;
    public $firstname;
    public $lastname,$company,$job;
    protected $listeners = ['updateannounces' => 'updateannounce'];

 public $employee_id;
    public $company_id;
    public $first_name;
    public $last_name;
    public $middle_name;
    public $suffix ,$cutoffs;
    public $cutoff_id;

    public function mount()
    {
        
        $companyId = Auth::user()->company_id ;

        $company = Company::find($companyId);

        $this->companyName = $company ? $company->description : 'Company not found';

        $this->employeeCount = EmployeeRecords::where('company_id', $companyId)
        ->whereNotIn('department_id', [1, 3])
        ->count();
    
    $this->employeeCountemp = EmployeeRecords::where('company_id', $companyId)
        ->whereNotIn('department_id', [1, 2, 3]) 
        ->count();
        $this->employeeCountHR = EmployeeRecords::where('company_id', $companyId)
        ->where('department_id', 2) 
        ->count();
       
      if (Auth::check()) {
                $this->firstname = Auth::user();
                $this->lastname = Auth::user()->last_name;
                $this->company = Company::where('company_id', Auth::user()->company_id)->first();
                $this->job = Department::where('department_id', Auth::user()->department_id)->first();

            } else {
               
            }
        $this->updateannounce();
    }

public function updateannounce()
    {
        $companyId = Auth::user()->company_id ; 
    $this->announce = Announcement::where('company_id', $companyId)
    ->orderBy('date', 'desc')  
    ->get();
    
    $companyId = Auth::user()->company_id;
    $employee_id = Auth::user()->employee_id;

 
    $this->cutoffs = Payslip::where('company_id', $companyId)
    ->where('employee_id', $employee_id)
    ->orderBy('cutoff_id', 'desc')
    ->get();

    }
   
    public function render()
    {
    
        return view('livewire.h-r.dashboard');
    }
}
