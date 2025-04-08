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
        $employee_id = Auth::user()->employee_id;

       
        $this->cutoffs = Cutoff::where('company_id', $companyId)
            ->whereHas('attendanceRecords', function ($query) {
                $query->whereNotNull('cutoff_id');
            })
            ->orderBy('cutoff_id', 'desc')
            ->get();
    
 
$this->latest = AttendanceRecord::where('employee_id', $employee_id)
->orderBy('attendance_id', 'desc')
->first();


$this->cut_attendance = AttendanceRecord::where('employee_id', $employee_id)
    ->whereIn('cutoff_id', $this->cutoffs->pluck('cutoff_id')->toArray()) 
    ->first();



    
    if ($this->cut_attendance && $this->cut_attendance->cutoff) {
        $startDate = \Carbon\Carbon::parse($this->cut_attendance->cutoff->date_start);
        $endDate = \Carbon\Carbon::parse($this->cut_attendance->cutoff->date_end);
    
        $this->cutoffdate = $startDate->format('D, M d Y') . ' - ' . $endDate->format('D, M d Y');
        
        $totalDays1 = $startDate->diffInDays($endDate);
        $this->totalDays = $totalDays1;
    } else {
        $this->cutoffdate = 'No cutoff available';
        $this->totalDays = 0;
    }


}




    public function render()
    {
        return view('livewire.h-r.employee-payslip');
    }
}
