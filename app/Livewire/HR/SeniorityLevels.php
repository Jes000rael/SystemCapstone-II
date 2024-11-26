<?php

namespace App\Livewire\HR;

use Livewire\Component;
use App\Models\SeniorityLevel;
use Illuminate\Support\Facades\Auth;
class SeniorityLevels extends Component
{
    public $seniority;

    public function mount()
    {
      
       $this->updateSeniority();
      
    }

    public function updateSeniority()
    {
        $companyId = Auth::user()->company_id ; 
        $this->seniority = SeniorityLevel::where('company_id', $companyId)->get();
    }

    public function deleteSeniority($seniorityID)

{

    if ($seniorityID) {
        SeniorityLevel::find($seniorityID)->delete();
    
        $this->updateSeniority();

        return redirect()->intended('/admin/seniority')->with('seniority-deleted', 'Successfully');
        // $this->dispatch('company-deleted', ['message' => 'Company Deleted successfully!']);

       
    }
}
    public function render()
    {
        return view('livewire.h-r.seniority-level');
    }
}
