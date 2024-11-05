<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\EmployeeRecords;

use Illuminate\Support\Facades\Auth;

class Username extends Component
{

    public $firstname;
    public $lastname;
    public function mount() { 

        if (Auth::check()) {
            $this->firstname = Auth::user();
            $this->lastname = Auth::user()->last_name;

           
        } else {
           
        }
        
    }
    public function render()
    {
        return view('livewire.auth.username');
    }
}
