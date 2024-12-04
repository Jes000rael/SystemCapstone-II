<?php

namespace App\Livewire\Auth;


use Livewire\Component;
use App\Models\EmployeeRecords;

use Illuminate\Support\Facades\Auth;


class Logout extends Component
{
    public $status ='offline';
    public function logout() {
        $employee = EmployeeRecords::where('employee_id',Auth::user()->employee_id)->first();
        $employee->update([
            'status' => $this->status,
          
        ]);
        auth()->logout();
      
      
      
        return redirect('/login');

    }
    public function render()
    {
        return view('livewire.auth.logout');
    }
}
