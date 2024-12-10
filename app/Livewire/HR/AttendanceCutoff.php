<?php

namespace App\Livewire\HR;

use Livewire\Component;
use App\Models\Cutoff;
use Illuminate\Support\Facades\Auth;
class AttendanceCutoff extends Component
{

  
public $cutoff;
    

    public function mount()
    {
      
        $this->updateCutoff();
    
      
    }

public function updateCutoff()
    {
        $companyId = Auth::user()->company_id ; 
        $this->cutoff = Cutoff::where('company_id', $companyId)->get();
    }
    public function deletecutoff($cutoffId)

{
    if ($cutoffId) {
        Cutoff::find($cutoffId)->delete();
    
        $this->updateCutoff();
        return redirect()->intended('/admin/cutoff')->with('cutoff-deleted', 'Successfully');
        // $this->dispatch('company-deleted', ['message' => 'Company Deleted successfully!']);

       
    }
}
    public function render()
    {
        return view('livewire.h-r.attendance-cutoff');
    }
}
