<?php

namespace App\Livewire\Auth;


use Livewire\Component;
use App\Models\EmployeeRecords;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class Logout extends Component
{
    public $status ='offline';
    public function logout() {
        $employee = EmployeeRecords::where('employee_id',Auth::user()->employee_id)->first();
        $employee->update([
            'status' => $this->status,
          
        ]);
        Auth::logout();
        
        Session::invalidate();
        Session::regenerateToken();

        
        return redirect()->route('login'); 

    }
    public function render()
    {
        return view('livewire.auth.logout');
    }
}
