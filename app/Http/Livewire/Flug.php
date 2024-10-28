<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\userLogin;
use Illuminate\Support\Facades\Auth;

class Flug extends Component
{

    public $lastname;
    public $firstname;
    // public $email;
   

    public function mount()
    {
        
        if (Auth::check()) {
            $this->lastname = Auth::user()->last_name;
            $this->firstname = Auth::user()->first_name;
            // $this->email = Auth::user()->email;
        } else {
            $this->lastname = 'Guest';
            $this->firstname = 'Hello';
        }
    }
    public function render()
    {
        return view('livewire.flug');
    }
}
