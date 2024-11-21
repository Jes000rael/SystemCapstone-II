<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\SeniorityLevel;

class SenioritySelect extends Component
{
    public $seniority;

    public function mount()
    {
        $this->updateSenior();
    }
    
    public function updateSenior()
    {
        $this->seniority = SeniorityLevel::all();
    }
    public function deleteSeniorityLevel($seniorityId)

{
    if ($seniorityId) {
    SeniorityLevel::find($seniorityId)->delete();
    
        $this->updateSenior();
        return redirect()->intended('/company/seniority')->with('seniority-deleted', 'Successfully');
        // $this->dispatch('company-deleted', ['message' => 'Company Deleted successfully!']);

       
    }

    }
    public function render()
    {
        return view('livewire.seniority-select');
    }
}
