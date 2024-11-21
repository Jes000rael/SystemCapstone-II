<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\EmploymentStatus;
class EmploymentSelect extends Component
{
public $employment;

public function mount()
{
    $this->updateEmployment();
}

public function updateEmployment()
{
    $this->employment = EmploymentStatus::all();
}
public function deleteEmployment($employmentId)

{
if ($employmentId) {
  EmploymentStatus::find($employmentId)->delete();

    $this->updateEmployment();
    return redirect()->intended('/company/employment')->with('employment-deleted', 'Successfully');
    // $this->dispatch('company-deleted', ['message' => 'Company Deleted successfully!']);

   
}

}
    public function render()
    {
        return view('livewire.employment-select');
    }
}
