<?php

namespace App\Livewire\Employee;

use Livewire\Component;
use App\Models\Announcement;
use App\Models\Company;
use App\Models\Department;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Component
{
    public $announce;
    public $firstname;
    public $lastname,$company,$job;
    protected $listeners = ['updateannounces' => 'updateannounce'];
  public function mount()
  {


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
        return view('livewire.employee.dashboard');
    }
}
