<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Department;
use App\Models\Company;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
class DepartmentEdit extends Component
{
  
      
    public function render()
    {
        return view('livewire.department-edit');
    }
}
