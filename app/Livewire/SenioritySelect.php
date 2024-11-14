<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\SeniorityLevel;

class SenioritySelect extends Component
{
    public $seniority;

    public function mount()
    {

            $this->seniority = SeniorityLevel::all();
       

    }
    public function render()
    {
        return view('livewire.seniority-select');
    }
}
