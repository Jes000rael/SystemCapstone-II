<?php

namespace App\Livewire\HR;

use Livewire\Component;
use App\Models\AttendanceRecord;
use App\Models\Cutoff;
use App\Models\BreaktimeLog;
use App\Models\OvertimeLog;
use App\Models\EmployeeRecords;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use Carbon\Carbon;

class EmployeePayslip extends Component
{

    public $employee_id;
    public $company_id;
    public $first_name;
    public $last_name;
    public $middle_name;
    public $suffix ,$cutoffs;
    public $cutoff_id;
    public function mount($empID)
    {
        
      
      $decryptedEmpID = Crypt::decrypt($empID);
            $employee = EmployeeRecords::findOrFail($decryptedEmpID);
            $this->employee_id = $employee->employee_id;
            $this->company_id = $employee->company_id;
            $this->first_name = $employee->first_name;
            $this->last_name = $employee->last_name;
            $this->middle_name = $employee->middle_name;
            $this->suffix = $employee->suffix;
        
    
    $this->loadDropdownData();
    
}
    public function loadDropdownData()
        {
            $companyId = Auth::user()->company_id;
          $employee_id = $this->employee_id;

       
        $this->cutoffs = Cutoff::where('company_id', $companyId)
        ->whereHas('attendanceRecords', function ($query) use ($employee_id) {
            $query->where('employee_id', $employee_id)
                  ->whereNotNull('cutoff_id');
        })
        ->orderBy('cutoff_id', 'desc')
        ->get();
}

public function goToPayslipDetails()
{
$this->loadAttendance($this->cutoff_id);


   
}
private function loadAttendance($cutoffId)
{
   

    if (!$this->cutoff_id) {
        session()->flash('error', 'Please select a cutoff period.');
        return;
    }

    $encryptedEmpID = Crypt::encrypt($this->employee_id);
    $encryptedCutoffID = Crypt::encrypt($this->cutoff_id);

    return redirect()->route('print-payslip', [
        'empID' => $encryptedEmpID,
        'cutoffID' => $encryptedCutoffID,
    ]);

}






    public function render()
    {
        return view('livewire.h-r.employee-payslip');
    }
}
