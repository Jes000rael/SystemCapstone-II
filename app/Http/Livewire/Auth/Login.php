<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Models\EmployeeRecords;

class Login extends Component
{
    public $username = '';
    public $password = '';


    protected $rules = [
        'username' => 'required',
        'password' => 'required',
    ];

   
    public function login() {

        $credentials = $this->validate();
        if(auth()->attempt(['username' => $this->username, 'password' => $this->password])) {

            $user = EmployeeRecords::where(['username' => $this->username])->first();
            // session(['user_name' => auth()->user()->name]);
            return redirect()->intended('/dashboard')->with('success', 'Welcome back!');        
        }
        else{
            return $this->addError('errors', trans('auth.failed')); 
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
