<?php

namespace App\Livewire\HR;

use Livewire\Component;
use App\Models\WorkSchedule;
use App\Models\EmployeeRecords;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
class AddWorkSchedule extends Component
{

public $description='';
    public $employee_id='',$monday_in='',$monday_out='',$tuesday_out='',$tuesday_in='',$wednesday_out='',$wednesday_in='',$thursday_in='',$thursday_out='',$friday_in='',$friday_out='',$saturday_out='',$saturday_in='',$sunday_in='',$sunday_out='';
    public $employeeID;

    protected $rules = [
        'monday_in' => 'nullable',
        'monday_out' => 'nullable',
        'tuesday_in' => 'nullable',
        'tuesday_out' => 'nullable',
        'wednesday_in' => 'nullable',
        'wednesday_out' => 'nullable',
        'thursday_in' => 'nullable',
        'thursday_out' => 'nullable',
        'friday_in' => 'nullable',
        'friday_out' => 'nullable',
        'saturday_in' => 'nullable',
        'saturday_out' => 'nullable',
        'sunday_in' => 'nullable',
        'sunday_out' => 'nullable',
    ];
    
       
            
          
        
    
        public function mount($empID)
        {
            
            try {
                $decryptedempID = Crypt::decrypt($empID);
                $existingSchedule = WorkSchedule::where('employee_id', $decryptedempID)->first();
                if ($existingSchedule) {
                    return redirect()->intended('/admin/employee_records')->with('employee_has', 'Successfully');
                }else{
                    
                    $employee = EmployeeRecords::findOrFail($decryptedempID);
                    $this->employee_id = $employee->employee_id;
                }
               
            } catch (DecryptException $e) {
             
                session()->flash('error', 'Invalid or corrupted Employee ID.');
            } catch (ModelNotFoundException $e) {
            
                session()->flash('error', 'Employee not found.');
            } catch (\Exception $e) {
              
                session()->flash('error', 'An unexpected error occurred: ' . $e->getMessage());
            }
        
        }
    
    
        public function addSchedule()
        {
            $this->validate();
            $this->employeeID = Auth::user()->employee_id;
            $scheduleData = [
                'company_id' => Auth::user()->company_id,
                'employee_id' => $this->employee_id,
                'monday_in' => $this->monday_in ?: null,
                'monday_out' => $this->monday_out ?: null,
                'tuesday_in' => $this->tuesday_in ?: null,
                'tuesday_out' => $this->tuesday_out ?: null,
                'wednesday_in' => $this->wednesday_in ?: null,
                'wednesday_out' => $this->wednesday_out ?: null,
                'thursday_in' => $this->thursday_in ?: null,
                'thursday_out' => $this->thursday_out ?: null,
                'friday_in' => $this->friday_in ?: null,
                'friday_out' => $this->friday_out ?: null,
                'saturday_in' => $this->saturday_in ?: null,
                'saturday_out' => $this->saturday_out ?: null,
                'sunday_in' => $this->sunday_in ?: null,
                'sunday_out' => $this->sunday_out ?: null,
                'updated_by' => $this->employeeID,
            ];
            WorkSchedule::create($scheduleData);
            
            // $this->reset(['description','value']);
          
            return redirect()->intended('/admin/employee_records')->with('schedule-add', 'Successfully');
    
       
          
        }
    public function render()
    {
        return view('livewire.h-r.add-work-schedule');
    }
}
