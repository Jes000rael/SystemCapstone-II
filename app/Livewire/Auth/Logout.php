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
