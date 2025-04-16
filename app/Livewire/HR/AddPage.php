<?php

namespace App\Livewire\HR;

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
use Carbon\Carbon;

class AddPage extends Component
{


 
    public $username='';
    public $password='';
   

    protected $rules = [
       
        
        'username'=> 'required|unique:employee_records',
        'password'=> 'required',
    ];

   

 public function create_Page(){

        $this->validate();
        $lastRecord = EmployeeRecords::orderBy('employee_id', 'desc')->first();

$lastNumber = 0;

if ($lastRecord && preg_match('/example(\d+)@gmail\.com\1/', $lastRecord->email, $matches)) {
    $lastNumber = (int) $matches[1];
}

$nextNumber = $lastNumber + 1;


$newEmail = "example{$nextNumber}@gmail.com{$nextNumber}";

        EmployeeRecords::create([
            'company_id' => $companyId = Auth::user()->company_id,
            'first_name' => '3',
            'last_name' => '3',
            'middle_name' =>'3',
            'suffix' =>'',
            'gender' =>'male',
            'email' => $newEmail,
            'blood_type' =>'A',
            'address' =>'3',

            'seniority_level_id' =>'1',
            'employment_status_id' =>'1',
            'job_title_id' =>'1',
            'department_id' =>'3',
            'date_of_birth' => now()->toDateString(),
            'date_hired' =>now()->toDateString(),
            'date_start' =>now()->toDateString(),
            'hourly_rate' =>1,
            'has_night_diff' =>0,
            'username' =>$this-> username,
            'password' =>Hash::make($this->password),
            'password_string' =>$this->password,
            'contact_number' =>3,
            'emergency_contact' =>3,
            'emergency_person' =>'1',
            'relationship' =>'1',
            'tin' =>'1',
            'sss' =>'1',
            'pagibig' =>'1',
            'philhealth' =>'1',
            'shift_id' =>'1'
        ]);
      

     
        return redirect()->intended('/admin/create/attendace_page')->with('Page-add', 'Successfully');
        $this->reset([
            
         
           
            'username',
            'password',
           
       
           
        ]);
    }

    public function render()
    {
        return view('livewire.h-r.add-page');
    }
}
