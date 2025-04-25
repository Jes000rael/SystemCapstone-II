<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use App\Models\EmployeeRecords;

class Login extends Component
{

    public $username = '';
    public $password = '';
    public $department_id = '';
    public $companyId = '';



    public function login()
    {
        $this->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
    
        $userRecord = EmployeeRecords::where('username', $this->username)->first();
    
        if (!$userRecord) {
            $this->reset(['password']);
            return $this->addError('errors', trans('auth.failed'));
        }
    
        if (auth()->attempt([
            'username' => $this->username,
            'password' => $this->password,
            'department_id' => $userRecord->department_id
        ])) {
            $user = auth()->user();
            $companyId = $userRecord->company_id;
            $departmentId = $userRecord->department_id;
    
         
            if ($companyId === 1) {
                return match ($departmentId) {
                    1 => redirect()->intended('/company')->with('success', 'Welcome back!'),
                    2 => redirect()->intended('/dashboard')->with('success', 'Welcome back!'),
                    3 => redirect()->intended('/company/attendance_page'),
                    default => redirect()->intended('/employee/dashboard')->with('success', 'Welcome back!'),
                };
            }
    
           
            return match ($departmentId) {
                2 => redirect()->intended('/dashboard')->with('success', 'Welcome back!'),
                3 => redirect()->intended('/company/attendance_page'),
                default => redirect()->intended('/employee/dashboard')->with('success', 'Welcome back!'),
            };
        }
    
        $this->reset(['password']);
        return $this->addError('errors', trans('auth.failed'));
    }
    


    public function render()
    {
        return view('livewire.auth.login');
    }
}
