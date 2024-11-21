<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Department;
use App\Models\Company;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
class DepartmentEdit extends Component
{
    public $description='';
    public $company_id='';
    public $company;
    protected $rules = [
        'company_id' => 'required',
        'description' => 'required',
    ];
       
            
          
        
    
        public function mount($departmentID)
        {
            
            $decrypteddepartmentID = Crypt::decrypt($departmentID);
            $depap = Department::findOrFail($decrypteddepartmentID);
            $this->description = $depap->description;
            $this->company_id = $depap->company_id;
            $this->loadDropdownData();
           
        }
    
        public function loadDropdownData()
        {
            $this->company = Company::all();
        
        }
    
        public function editDepartment()
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
            ]);
    
            session()->flash('message', 'Employee updated successfully!');
            return redirect()->intended('/company/employee/records')->with('updateEmployee', 'Successfull');
        }
      
    public function render()
    {
        return view('livewire.department-edit');
    }
}
