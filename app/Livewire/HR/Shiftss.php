<?php

namespace App\Livewire\HR;

use Livewire\Component;
use App\Models\Shift;
use Illuminate\Support\Facades\Auth;

class Shiftss extends Component
{
    public $shift;

    public function mount()
    {
      
       $this->updateShift();
      
    }

    public function updateShift()
    {
        $companyId = Auth::user()->company_id ; 
        $this->shift = Shift::where('company_id', $companyId)->get();
    }

    public function deleteShift($ShiftID)

{

    if ($ShiftID) {
        Shift::find($ShiftID)->delete();
    
        $this->updateShift();

        return redirect()->intended('/admin/shifts')->with('shift-deleted', 'Successfully');
        // $this->dispatch('company-deleted', ['message' => 'Company Deleted successfully!']);

       
    }
}
    public function render()
    {
        return view('livewire.h-r.shifts');
    }
}
