<?php

namespace App\Livewire\HR;
use App\Models\OffDutyCategory;
use App\Models\OffDutyDates;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class OffDuty extends Component
{


    public $Offduty;

    

    public function mount()
    {
      
        $this->updatedOffDuty();
    
    }

public function updatedOffDuty()
    {
        $companyId = Auth::user()->company_id ; 
        $this->Offduty = OffDutyDates::where('company_id', $companyId)->get();
      
    }

    public function DeleteHoliday($holidayId)
{
    if ($holidayId) {
        OffDutyDates::find($holidayId)->delete();
        
        $this->updatedOffDuty();
            return redirect()->intended('/admin/off-duty')->with('holiday-deleted', 'Successfully');
            // $this->dispatch('company-deleted', ['message' => 'Company Deleted successfully!']);
    
           
        }
}
    public function render()
    {
        return view('livewire.h-r.off-duty');
    }
}
