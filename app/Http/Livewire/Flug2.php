<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\userLogin;
use Illuminate\Support\Facades\Auth;

class Flug2 extends Component
{

   
    public $username;
   

    public function mount()
    {
        
        if (Auth::check()) {
           
            $this->username = Auth::user()->username;
        } else {
            $this->username = 'Guest';
        }
    }
    public function render()
    {
        return view('livewire.flug2');
    }
}
