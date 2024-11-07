<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;

use App\Models\EmployeeRecords;
use App\Models\Company;
use App\Models\SeniorityLevel;


class Addemployee extends Component
{
    public $company_id='';
    public $first_name='';
    public $last_name='';
    public $middle_name='';
    public $suffix='';
    public $blood_type='';
    public $address='';
    public $contact_number='';
    public $seniority_level_id='';
    public $employment_status_id='';
    public $job_title_id='';
    public $department_title='';
    public $date_of_birth='';
    public $date_hired='';
    public $date_start='';
    public $hourly_rate='';
    public $has_night_diff='';
    public $username='';
    public $password='';
    public $password_string='';
    public $emergency_contact='';
    public $emergency_person='';
    public $relationship='';
    public $tin='';
    public $sss='';
    public $pagibig='';
    public $philhealth='';
    public $shift_id='';
    public $employees,$companys,$senioritylevels;

    protected $rules = [
        'company_id' => 'required',
        'first_name' => 'required',
        'last_name' => 'required',
        'middle_name' => 'required',
        'blood_type' => 'required',
        'address' => 'required',
        'seniority_level_id' => 'required',
   
    ];

    public function mount()
    {
        $this->employees = EmployeeRecords::with(['company'])->get();
        $this->companys = Company::all();
        $this->senioritylevels = SeniorityLevel::all();

       
    }

    public function addemp(){

        $this->validate();

        EmployeeRecords::create([
            'company_id' => $this->company_id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'middle_name' => $this->middle_name,
            'suffix' => $this->suffix,
            'blood_type' => $this->blood_type,
            'address' => $this->address,
            'contact_number' => $this->contact_number,
            'seniority_level_id' =>$this->seniority_level_id,
            'employment_status_id' =>$this-> employment_status_id,
            'job_title_id' =>$this-> job_title_id,
            'department_title' =>$this-> department_title,
            'date_of_birth' =>$this-> date_of_birth,
            'date_hired' =>$this->date_hired,
            'date_start' =>$this-> date_start,
            'hourly_rate' =>$this->  hourly_rate,
            'has_night_diff' =>$this->has_night_diff,
            'username' =>$this-> username,
            'password' =>$this->Hash::make($this->password),
            'password_string' =>$this->  password_string,
            'contact_number' =>$this->  contact_number,
            'emergency_contact' =>$this-> emergency_contact,
            'emergency_person' =>$this->  emergency_person,
            'relationship' =>$this->   relationship,
            'tin' =>$this-> tin,
            'sss' =>$this->sss,
            'pagibig' =>$this-> pagibig,
            'philhealth' =>$this-> philhealth,
            'shift_id' =>$this-> shift_id,
        ]);
    }
    public function render()
    {
        return view('livewire.addemployee');
    }
}
