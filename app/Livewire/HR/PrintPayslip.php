<?php

namespace App\Livewire\HR;

use Livewire\Component;
use App\Models\AttendanceRecord;
use App\Models\Cutoff;
use App\Models\BreaktimeLog;
use App\Models\OvertimeLog;
use App\Models\EmployeeRecords;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Carbon\Carbon;

class PrintPayslip extends Component
{

    public $employee_id;
    public $cutoff_id;
    public $cutoffdate;

    public $company_id;
    public $first_name;
    public $last_name;
    public $middle_name;
    public $suffix ,$cutoffs;
 

    public function mount($empID, $cutoffID)
    {
        $decryptedEmpID= Crypt::decrypt($empID);
        $decryptedcutOff = Crypt::decrypt($cutoffID);

       
         $employee = EmployeeRecords::findOrFail($decryptedEmpID);
                $this->employee_id = $employee->employee_id;
                $this->company_id = $employee->company->description;
                $this->first_name = $employee->first_name;
                $this->last_name = $employee->last_name;
                $this->middle_name = $employee->middle_name;
                $this->suffix = $employee->suffix;

                $cutoff = Cutoff::findOrFail($decryptedcutOff);

                $startDate = \Carbon\Carbon::parse($cutoff->date_start);
                $endDate = \Carbon\Carbon::parse($cutoff->date_end);
                $this->cutoffdate = $startDate->format('D, M d Y') . ' - ' . $endDate->format('D, M d Y');
                



    }

    public function render()
    {
        return view('livewire.h-r.print-payslip');
    }
}
