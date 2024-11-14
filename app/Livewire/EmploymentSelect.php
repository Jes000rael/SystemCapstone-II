<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\EmploymentStatus;
class EmploymentSelect extends Component
{

    
public $employment;

    public function mount()
    {

            $this->employment = EmploymentStatus::all();
       

    }
    public function render()
    {
        return view('livewire.employment-select');
    }
}
