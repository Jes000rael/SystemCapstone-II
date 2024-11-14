<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Shift;

class ShiftSelect extends Component
{
    public $shift;

    public function mount()
    {
        $this->shift  = Shift::all();
    }
    public function render()
    {
        return view('livewire.shift-select');
    }
}
