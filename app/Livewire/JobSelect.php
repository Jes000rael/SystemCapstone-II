<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\JobTitle;

class JobSelect extends Component
{
    public $job;

    public function mount()
    {
        $this->job = JobTitle::all();
    }
    public function render()
    {
        return view('livewire.job-select');
    }
}
