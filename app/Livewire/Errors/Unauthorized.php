<?php

namespace App\Livewire\Errors;

use Livewire\Component;

class Unauthorized extends Component
{
    public function render()
    {
        return view('livewire.errors.unauthorized');
    }
}
