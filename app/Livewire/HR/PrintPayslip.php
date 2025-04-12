<?php

namespace App\Livewire\HR;

use Livewire\Component;
use Illuminate\Support\Facades\Crypt;

class PrintPayslip extends Component
{

    public $employee_id;
    public $cutoff_id;

    public function mount($empID, $cutoffID)
    {
        $this->employee_id = Crypt::decrypt($empID);
        $this->cutoff_id = Crypt::decrypt($cutoffID);

        // You can now use $this->employee_id and $this->cutoff_id
        // to load any data you want to display in the payslip.
    }

    public function render()
    {
        return view('livewire.h-r.print-payslip');
    }
}
