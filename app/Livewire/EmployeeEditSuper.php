<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use App\Models\EmployeeRecords;
use App\Models\Company;
use App\Models\SeniorityLevel;
use App\Models\EmploymentStatus;
use App\Models\JobTitle;
use App\Models\Department;
use App\Models\Shift;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class EmployeeEditSuper extends Component
{
    public $employee_id;
    public $company_id = '';
    public $first_name = '';
    public $last_name = '';
    public $middle_name = '';
    public $suffix = '';
    public $blood_type = '';
    public $address = '';
    public $contact_number = '';
    public $seniority_level_id = '';
    public $employment_status_id = '';
    public $job_title_id = '';
    public $department_id = '';
    public $date_of_birth = '';
    public $date_hired = '';
    public $date_start = '';
    public $hourly_rate = '';
    public $has_night_diff = '';
    public $username = '';
    public $password = '';
    public $emergency_contact = '';
    public $emergency_person = '';
    public $relationship = '';
    public $tin = '';
    public $sss = '';
    public $pagibig = '';
    public $philhealth = '';
    public $shift_id = '';
    public $gender = '';
    public $email = '';
    public $companys, $senioritylevels, $employmentstatus, $jobtitle, $department=[], $depart=[], $shifts;

    public function getRules()
{
    return [
        'company_id' => 'required',
        'first_name' => 'required',
        'last_name' => 'required',
        'middle_name' => 'required',
        'gender' => 'required|in:Male,Female',
        'blood_type' => 'required',
        'address' => 'required',
        'seniority_level_id' => 'required',
        'employment_status_id' => 'required',
        'job_title_id' => 'required',
        'department_id' => 'required',
        'date_of_birth' => 'required|date',
        'date_hired' => 'required|date',
        'date_start' => 'required|date',
        'hourly_rate' => 'required|numeric|regex:/^\d+(\.\d+)?$/',
        'has_night_diff' => 'required|boolean',
        'username' => 'required|unique:employee_records,username,' . $this->employee_id . ',employee_id', 
        'contact_number' => 'required',
        'emergency_contact' => 'required',
        'emergency_person' => 'required',
        'relationship' => 'required',
        'tin' => 'required',
        'sss' => 'required',
        'pagibig' => 'required',
        'philhealth' => 'required',
        'shift_id' => 'required',
        'email' => 'required|email|unique:employee_records,email,' . $this->employee_id . ',employee_id',
    ];
}

    public function mount($empID)
    {
        
        $decryptedEmpID = Crypt::decrypt($empID);
        $employee = EmployeeRecords::findOrFail($decryptedEmpID);
        $this->employee_id = $employee->employee_id;
        $this->company_id = $employee->company_id;
        $this->first_name = $employee->first_name;
        $this->last_name = $employee->last_name;
        $this->middle_name = $employee->middle_name;
        $this->suffix = $employee->suffix;
        $this->gender = $employee->gender;
        $this->blood_type = $employee->blood_type;
        $this->address = $employee->address;
        $this->contact_number = $employee->contact_number;
        $this->seniority_level_id = $employee->seniority_level_id;
        $this->employment_status_id = $employee->employment_status_id;
        $this->job_title_id = $employee->job_title_id;
        $this->department_id = $employee->department_id;
        $this->date_of_birth = $employee->date_of_birth;
        $this->date_hired = $employee->date_hired;
        $this->date_start = $employee->date_start;
        $this->hourly_rate = $employee->hourly_rate;
        $this->has_night_diff = $employee->has_night_diff;
        $this->username = $employee->username;
        $this->password = $employee->password_string;
        $this->emergency_contact = $employee->emergency_contact;
        $this->emergency_person = $employee->emergency_person;
        $this->relationship = $employee->relationship;
        $this->tin = $employee->tin;
        $this->sss = $employee->sss;
        $this->pagibig = $employee->pagibig;
        $this->philhealth = $employee->philhealth;
        $this->shift_id = $employee->shift_id;
        $this->email = $employee->email;

        $this->loadDropdownData($this->company_id,$this->department_id);
    }

    public function loadDropdownData($company_id, $department_id)
    {
        $this->companys = Company::all();
        $this->senioritylevels = SeniorityLevel::where('company_id', $company_id)->get();
        $this->employmentstatus = EmploymentStatus::where('company_id', $company_id)->get();
        $this->jobtitle = JobTitle::where('company_id', $company_id)->get();
        $this->shifts = Shift::where('company_id', $company_id)->get();
    
        if ($company_id == 1) {
            if ($department_id == 1) {
                $this->depart = Department::where('company_id', 1)
                                          ->where('department_id', '!=', 3)
                                          ->get();
            } else {
                $this->depart = Department::where('company_id', 1)
                                          ->whereNotIn('department_id', [1, 3])
                                          ->get();
            }
        } else {
            // Always include department 2 from company 1
            $companyDepartments = Department::where('company_id', $company_id)
                                            ->where('department_id', '!=', 3)
                                            ->get();
    
            $staticDepartments = Department::where('company_id', 1)
                                           ->where('department_id', 2)
                                           ->get();
    
            $this->depart = $companyDepartments->merge($staticDepartments)->unique('department_id')->values();
        }
    }
    
    public function updatedCompanyId($company_id)
    {
        if ($company_id) {
            $this->loadDropdownData($company_id, $this->department_id ?? null);
        } else {
            $this->depart = [];
            $this->senioritylevels = [];
            $this->employmentstatus = [];
            $this->jobtitle = [];
            $this->shifts = [];
        }
    }
    

    public function updateEmployee()
    {
        $this->validate();
        $this->suffix = $this->suffix ?: null;

        $employee = EmployeeRecords::findOrFail($this->employee_id);
        $employee->update([
            'company_id' => $this->company_id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'middle_name' => $this->middle_name,
            'suffix' => $this->suffix,
            'gender' => $this->gender,
            'blood_type' => $this->blood_type,
            'address' => $this->address,
            'contact_number' => $this->contact_number,
            'seniority_level_id' => $this->seniority_level_id,
            'employment_status_id' => $this->employment_status_id,
            'job_title_id' => $this->job_title_id,
            'department_id' => $this->department_id,
            'date_of_birth' => $this->date_of_birth,
            'date_hired' => $this->date_hired,
            'date_start' => $this->date_start,
            'hourly_rate' => $this->hourly_rate,
            'has_night_diff' => (bool)$this->has_night_diff,
            'username' => $this->username,
            'password' => $this->password ? Hash::make($this->password) : $employee->password,
            'password_string' => $this->password,
            'contact_number' => $this->contact_number,
            'emergency_contact' => $this->emergency_contact,
            'emergency_person' => $this->emergency_person,
            'relationship' => $this->relationship,
            'tin' => $this->tin,
            'sss' => $this->sss,
            'pagibig' => $this->pagibig,
            'philhealth' => $this->philhealth,
            'shift_id' => $this->shift_id,
            'email' => $this->email,
        ]);


        return redirect()->intended('/company/employee/records')->with('updateEmployee', 'Successfully');
    }
    public function render()
    {
        return view('livewire.employee-edit-super');
    }
}
