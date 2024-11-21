<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Shift;

class ShiftSelect extends Component
{
    public $shift;

    public function mount()
    {
        $this->updateShift();
    }
    
    public function updateShift()
    {
        $this->shift = Shift::all();
    }
    public function deleteShift($shiftId)

{
    if ($shiftId) {
    Shift::find($shiftId)->delete();
    
        $this->updateShift();
        return redirect()->intended('/company/shift')->with('shift-deleted', 'Successfully');
        // $this->dispatch('company-deleted', ['message' => 'Company Deleted successfully!']);

       
    }

    }
    public function render()
    {
        return view('livewire.shift-select');
    }
}
