<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\EmployeeRecords;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class ChangePassword extends Component
{
  public $password='';
  public $newpassword='';
  public $confirmpassword='';




  public function changepass() {

      $this->validate([
          'password' => 'required',
          'newpassword' => 'required|min:8',
          'confirmpassword' => 'required|same:newpassword',
      ]);
  
      if (auth()->attempt(['username' => Auth::user()->username, 'password' => $this->password])) {
          $employee = EmployeeRecords::findOrFail(Auth::user()->employee_id);
          $employee->update([
              'password' => Hash::make($this->newpassword),
              'password_string' => $this->newpassword
          ]);
  
          $this->reset(['password', 'newpassword', 'confirmpassword']);
          $this->dispatch('changepassword');
 
      } else {
          $this->addError('password', 'The current password is incorrect.');
      }
  }
  


    public function render()
    {
        return view('livewire.auth.change-password');
    }
}
