<?php

namespace App\Livewire\HR;

use Livewire\Component;
use App\Models\WorkSchedule;
use App\Models\EmployeeRecords;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
class EditWorkSchedule extends Component
{

    public $monday_in='',$monday_out='',$tuesday_out='',$tuesday_in='',$wednesday_out='',$wednesday_in='',$thursday_in='',$thursday_out='',$friday_in='',$friday_out='',$saturday_out='',$saturday_in='',$sunday_in='',$sunday_out='';
    public $employeeID;


          
        
    
        public function mount($empID)
        {
            
            try {
                $decryptedempID = Crypt::decrypt($empID);
                    $employee = WorkSchedule::where('employee_id', $decryptedempID)->firstOrFail();
                    $this->employeeID =$employee->employee_id;

                    $this->monday_in =$employee->monday_in;
                    $this->monday_out =$employee->monday_out;
                    $this->tuesday_in =$employee->tuesday_in;
                    $this->tuesday_out =$employee->tuesday_out;
                    $this->wednesday_in =$employee->wednesday_in;
                    $this->wednesday_out =$employee->wednesday_out;
                    $this->thursday_in =$employee->thursday_in;
                    $this->thursday_out =$employee->thursday_out;
                    $this->friday_in =$employee->friday_in;
                    $this->friday_out =$employee->friday_out;
                    $this->saturday_in =$employee->saturday_in;
                    $this->saturday_out =$employee->saturday_out;
                    $this->sunday_in =$employee->sunday_in;
                    $this->sunday_out =$employee->sunday_out;

            } catch (DecryptException $e) {
             
               
            return redirect()->intended('/admin/employee_records')->with('notsched', 'Successfully');

            } catch (ModelNotFoundException $e) {
            
                
            return redirect()->intended('/admin/employee_records')->with('notsched', 'Successfully');

            } catch (\Exception $e) {
            return redirect()->intended('/admin/employee_records')->with('notsched', 'Successfully');

              
                session()->flash('error', 'An unexpected error occurred: ' . $e->getMessage());
            }
        
        }
    
    
        public function updateSchedule()
        {


           
            
            
            $scheduleData = [
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
            
           
            $schedule = WorkSchedule::where('employee_id', $this->employeeID)->first();
            
            if ($schedule) {
                $schedule->update($scheduleData);
            return redirect()->intended('/admin/employee_records')->with('updatesched', 'Successfully');
            } else {
               
            }
            
          
    
       
          
        }
    public function render()
    {
        return view('livewire.h-r.edit-work-schedule');
    }
}
