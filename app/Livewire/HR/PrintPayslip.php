<?php

namespace App\Livewire\HR;

use Livewire\Component;
use App\Models\AttendanceRecord;
use App\Models\Cutoff;
use App\Models\BreaktimeLog;
use App\Models\OvertimeLog;
use App\Models\EmployeeRecords;
use App\Models\Deductions;
use App\Models\RequestTimeAdjustments;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Carbon\Carbon;

class PrintPayslip extends Component
{

    public $employee_id,$email,$contact_number,$hourly_rate,$department_id,$job_title_id,$shift_id,$address,$conversion_rate,$deductions,$totalDeductions,$totalnigtdiffhours;
    public $attendance, $cutoffs, $cut_off, $latest,$breaktime,$cut_attendance,$cutoffdate,$totalDays,$totalHours,$totalOvertime,$overBreak,$totalearned,$employeeRate,$employeePresent,$totalSalary,$ratetoCutoff,$totalSalarys;
    public $cutoff_id,$coverup;
   
    public $company_id;
    public $first_name;
    public $last_name;
    public $middle_name;
    public $suffix;
    public $addDeductions = false;
 

    public function mount($empID, $cutoffID, $deduct = 0)
    {

        $decryptedEmpIDs = [Crypt::decrypt($empID)];

        $this->deductions = Deductions::where('employee_id', $decryptedEmpIDs)->get();
        $this->totalDeductions = $this->deductions->sum('value');
        


        $decryptedEmpID= Crypt::decrypt($empID);
        $decryptedcutOff = Crypt::decrypt($cutoffID);
        if ($this->deductions->isEmpty()) {
            $this->addDeductions = false;
        } else {
            $this->addDeductions = ($deduct == 1); 
        }

       

       
         $employee = EmployeeRecords::findOrFail($decryptedEmpID);
                $this->employee_id = $employee->employee_id;
                $this->company_id = $employee->company->description;
                $this->first_name = $employee->first_name;
                $this->last_name = $employee->last_name;
                $this->middle_name = $employee->middle_name;
                $this->suffix = $employee->suffix;
                $this->address = $employee->address;
                $this->shift_id = $employee->shift->description;
                $this->job_title_id = $employee->jobtitle->description;
                $this->department_id = $employee->department->description;
                $this->hourly_rate = $employee->hourly_rate;
                $this->contact_number = $employee->contact_number;
                $this->email = $employee->email;


                $cutoff = Cutoff::findOrFail($decryptedcutOff);
                $this->cutoff_id = $cutoff->cutoff_id;
                $this->conversion_rate = $cutoff->conversion_rate;


                $startDate = \Carbon\Carbon::parse($cutoff->date_start);
                $endDate = \Carbon\Carbon::parse($cutoff->date_end);
                $this->cutoffdate = $startDate->format('D, M d Y') . ' - ' . $endDate->format('D, M d Y');


                $decryptedcutOffs = [Crypt::decrypt($cutoffID)];
        $decryptedEmpIDs = [Crypt::decrypt($empID)];


        
 $totalHours = AttendanceRecord::where('employee_id', $decryptedEmpIDs)
    ->whereIn('cutoff_id', $decryptedcutOffs)
    ->whereNotNull('time_out')

    ->sum('total_hours');

   
    $coverup = RequestTimeAdjustments::whereHas('attendance', function ($query) use ($decryptedEmpIDs, $decryptedcutOffs) {
        $query->where('employee_id', $decryptedEmpIDs)
    ->whereNotNull('time_out')

              ->whereIn('cutoff_id', $decryptedcutOffs);

              
    })->sum('total_hours');
    
    $this->totalHours = $totalHours - $coverup;
    $this->coverup = $coverup;

    $totalOvertime = AttendanceRecord::where('employee_id', $decryptedEmpIDs)
    ->whereIn('cutoff_id', $decryptedcutOffs)
    ->whereNotNull('time_out')

    ->sum('total_ot');

    $this->totalOvertime = $totalOvertime;

    $overBreak = AttendanceRecord::where('employee_id', $decryptedEmpIDs)
    ->whereIn('cutoff_id', $decryptedcutOffs)
    ->whereNotNull('time_out')

    ->sum('over_break');

    $this->overBreak = $overBreak;

    $employeeRate = AttendanceRecord::where('employee_id', $decryptedEmpIDs)
    ->whereNotNull('time_out') 
    ->whereIn('cutoff_id', $decryptedcutOffs)
    ->sum('rate');

    $employeePresent = AttendanceRecord::where('employee_id', $decryptedEmpIDs)
    ->whereNotNull('time_out') 
    ->whereIn('cutoff_id', $decryptedcutOffs)
    ->count();


    $totalnigtdiffhours = AttendanceRecord::where('employee_id', $decryptedEmpIDs)
    ->whereIn('cutoff_id', $decryptedcutOffs)
    ->where('has_night_diff', 1)
    ->whereNotNull('time_out')

    ->sum('total_hours');

$totaldiff = $this->hourly_rate * 0.30;
$totaldiffnight =  $totalnigtdiffhours * $totaldiff;
$this->totalnigtdiffhours = $totalnigtdiffhours;


    $cutoffRate = Cutoff::where('cutoff_id', $decryptedcutOff)->first();
    $totalearneded = $totalHours + $totalOvertime - $overBreak;
     

    $this->totalearned = $totalearneded;
    
    $totalNightDiffHours = AttendanceRecord::where('employee_id', $decryptedEmpIDs)
    ->whereIn('cutoff_id', $decryptedcutOffs)
    ->where('has_night_diff', 1)
    ->whereNotNull('time_out')
    ->sum('total_hours');

$records = AttendanceRecord::where('employee_id', $decryptedEmpIDs)
    ->whereIn('cutoff_id', $decryptedcutOffs)
    ->whereNotNull('time_out')
    ->get();

$totalEarned = 0;
$baseRate = $records->first()?->rate ?? 0; 
foreach ($records as $record) {
    $hours = $record->total_hours ?? 0;
    $otime = $record->total_ot ?? 0;
    $overBreak = $record->over_break ?? 0;
    $rate = $record->rate ?? 0;
    $diff = $record->has_night_diff;

    $earned = ($hours + $otime - $overBreak) * $rate;

    $nightdifftotalhours = 0;

    if ($diff === 1) {
        $diffnigthrate = $rate * 0.30;
        $nightdifftotalhours = $hours * $diffnigthrate;
    }

    $totalEarned += $earned + $nightdifftotalhours;
}




$totalSalary = $totalEarned ;

$ratetoCutoff = $cutoffRate ? ($totalSalary * $cutoffRate->conversion_rate) : 0;


   
  
  

    if ($this->addDeductions) {
        $decryptedEmpIDs = [Crypt::decrypt($empID)];
        $deduction = Deductions::where('employee_id', $decryptedEmpIDs)
        ->sum('value');

    $this->totalSalary = $totalSalary;
    $netSalary = $ratetoCutoff - $deduction;
    $this->ratetoCutoff = $netSalary;

   
    }else{
    $this->ratetoCutoff = $ratetoCutoff;
    $this->totalSalary = $totalSalary;



    }




                
                
    }

    public function render()
    {
        return view('livewire.h-r.print-payslip');
    }
}
