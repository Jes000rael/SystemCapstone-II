<?php

namespace App\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        \Log::info('Rendering dashboard view.');
        return view('livewire.dashboard');
    }
}
