<?php

namespace App\Livewire\HR;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;
use App\Models\Department;
use App\Models\EmployeeRecords;
use App\Models\Announcement;


class Dashboard extends Component
{
    public $employeeCount,$companyName;
    public $announce;
    public $firstname;
    public $lastname,$company,$job;
    protected $listeners = ['updateannounces' => 'updateannounce'];

    public function mount()
    {
        
        $companyId = Auth::user()->company_id ;

        $company = Company::find($companyId);

        $this->companyName = $company ? $company->description : 'Company not found';

        $this->employeeCount = EmployeeRecords::where('company_id', $companyId)
        ->where('department_id', '!=', 1) 
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

    }
   
    public function render()
    {
    
        return view('livewire.h-r.dashboard');
    }
}
