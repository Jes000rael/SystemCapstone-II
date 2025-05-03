<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\EmployeeRecords;
use App\Models\Company;
use App\Models\SeniorityLevel;
use App\Models\EmploymentStatus;
use App\Models\JobTitle;
use App\Models\Department;
use App\Models\Shift;

class EmployeeAdd extends Component
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
    public $department_id='';
    public $date_of_birth='';
    public $date_hired='';
    public $date_start='';
    public $hourly_rate='';
    public $has_night_diff='';
    public $username='';
    public $password='';
    public $email='';
  
    public $emergency_contact='';
    public $emergency_person='';
    public $relationship='';
    public $tin='';
    public $sss='';
    public $pagibig='';
    public $philhealth='';
    public $shift_id='';
    public $gender='';
    public $employees;
      
    public $companys = [];
    public $senioritylevels = [];
    public $employmentstatus = [];
    public $jobtitle = [];
    public $department = [];
    public $shifts = [];

    public $department1 = [];


    protected $rules = [
        'company_id' => 'required',
        'first_name' => 'required',
        'last_name' => 'required',
        'middle_name' => 'required',
        'email' => 'required|email|unique:employee_records',
        'gender' => 'required|in:Male,Female',
        'blood_type' => 'required',
        'address' => 'required',
        'seniority_level_id' => 'required',
        'employment_status_id'=> 'required',
        'job_title_id'=> 'required',
        'department_id'=> 'required',
        'date_of_birth'=> 'required|date',
        'date_hired'=> 'required|date',
        'date_start'=> 'required|date',
        'hourly_rate'=> 'required|numeric|regex:/^\d+(\.\d+)?$/',
        'has_night_diff'=> 'required|boolean',
        'username'=> 'required|unique:employee_records',
        'password'=> 'required',
        'contact_number'=> 'required',
        'emergency_contact'=> 'required',
        'emergency_person'=> 'required',
        'relationship'=> 'required',
        'tin'=> 'required',
        'sss'=> 'required',
        'pagibig'=> 'required',
        'philhealth'=> 'required',
        'shift_id'=> 'required',
   
    ];

    public function mount()
    {
        
        $this->employees = EmployeeRecords::with(['company'])->get();
        $this->companys = Company::all();
      
    
        // $this->senioritylevels = SeniorityLevel::all();
        // $this->employmentstatus = EmploymentStatus::all();
        // $this->jobtitle = JobTitle::all();
        // $this->shifts = Shift::all();

    }

    
        // Update dependent options based on company selection
        public function updatedCompanyId($company_id)
        {
            if ($company_id) {
                if ($company_id == 1) {
                    // For company_id 1: exclude department 3
                    $this->department = Department::where('company_id', $company_id)
                                                  ->where('department_id', '!=', 3)
                                                  ->get();
                } else {
                    // This query gets departments 1 and 3 from company 1...
                    $this->department1 = Department::where('company_id', 1)
                    ->whereIn('department_id', [2])
                    ->get();

                
                    // ...But this immediately replaces it with all departments from selected company
                    $this->department = Department::where('company_id', $company_id)->get();
                }

                // Filter seniority levels based on selected company
                $this->senioritylevels = SeniorityLevel::where('company_id', $company_id)->get();
    
                // Filter employment status based on selected company
                $this->employmentstatus = EmploymentStatus::where('company_id', $company_id)->get();
    
                // Filter job titles based on selected company
                $this->jobtitle = JobTitle::where('company_id', $company_id)->get();
                 $this->shifts = Shift::where('company_id', $company_id)->get();

            } else {
                // Reset dependent values if no company is selected
                $this->senioritylevels = [];
                $this->employmentstatus = [];
                $this->jobtitle = [];
                $this->shifts = [];
                $this->department = [];
                $this->department1 = [];

            }
        }

    public function addemp(){

        $this->validate();

        EmployeeRecords::create([
            'company_id' => $this->company_id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'middle_name' => $this->middle_name,
            'suffix' => $this->suffix,
            'gender' => $this->gender,
            'blood_type' => $this->blood_type,
            'address' => $this->address,
            'contact_number' => $this->contact_number,
            'seniority_level_id' =>$this->seniority_level_id,
            'employment_status_id' =>$this-> employment_status_id,
            'job_title_id' =>$this-> job_title_id,
            'department_id' =>$this-> department_id,
            'date_of_birth' =>$this-> date_of_birth,
            'date_hired' =>$this->date_hired,
            'date_start' =>$this-> date_start,
            'hourly_rate' =>$this->  hourly_rate,
            'has_night_diff' =>(bool)$this->has_night_diff,
            'username' =>$this-> username,
            'password' =>Hash::make($this->password),
            'password_string' =>$this->password,
            'contact_number' =>$this->  contact_number,
            'emergency_contact' =>$this-> emergency_contact,
            'emergency_person' =>$this->  emergency_person,
            'relationship' =>$this->   relationship,
            'tin' =>$this-> tin,
            'sss' =>$this->sss,
            'pagibig' =>$this-> pagibig,
            'philhealth' =>$this-> philhealth,
            'shift_id' =>$this-> shift_id,
            'email' =>$this-> email
        ]);
      

        $this->dispatch('employee-added', ['message' => 'Employee added successfully!']);
        $this->reset([
            'company_id',
            'first_name',
            'last_name',
            'middle_name',
            'gender',
            'suffix',
            'blood_type',
            'gender',
            'address',
            'email',
            'seniority_level_id',
            'employment_status_id',
            'job_title_id',
            'department_id',
            'date_of_birth',
            'date_hired',
            'date_start',
            'hourly_rate',
            'has_night_diff',
            'username',
            'password',
            'contact_number',
            'emergency_contact',
            'emergency_person',
            'relationship',
            'tin',
            'sss',
            'pagibig',
            'philhealth',
            'shift_id'
       
           
        ]);
    }
    public function render()
    {
        return view('livewire.employee-add');
    }
}
