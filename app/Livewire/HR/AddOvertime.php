<?php

namespace App\Livewire\HR;

use Livewire\Component;
use App\Models\OvertimeLog;
use App\Models\AttendanceRecord;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
class AddOvertime extends Component
{
    public function addOvertime($attendance_id)

{
    if ($attendance_id) {
        $employee = AttendanceRecord::findOrFail($attendance_id);

        OvertimeLog::create([
            'attendance_id' => $employee->attendance_id,
        ]);

        return redirect()->intended('/admin/attendance')->with('job-deleted', 'Successfully');
       
    }
}
    
    // public $start_time='';
    // public $end_time='';
    // public $total_hours='';
    // public $attendance_id='';
    // public $total_hour = '';
    

    // protected $rules = [
    //     'start_time' => 'required|date_format:H:i',  
    //     'end_time' => 'required|date_format:H:i|after:start_time',  
    //     'total_hours' => 'required|numeric|min:0', 
    // ];
    
          
        
    
    //     public function mount($overID)
    //     {
            
    //         try {
           
    //             $decryptedoverID = Crypt::decrypt($overID);
         
    //             $OvertimeLog = AttendanceRecord::findOrFail($decryptedoverID);
            
           
    //             $this->attendance_id = $OvertimeLog->attendance_id;


    //         } catch (DecryptException $e) {
             
    //             session()->flash('error', 'Invalid or corrupted Overtime ID.');
    //         } catch (ModelNotFoundException $e) {
            
    //             session()->flash('error', 'Overtime not found.');
    //         } catch (\Exception $e) {
              
    //             session()->flash('error', 'An unexpected error occurred: ' . $e->getMessage());
    //         }
        
           
    //     }
    
    
    //     public function addOver()
    //     {
    //         $this->validate();

    //         OvertimeLog::create([
    //             'start_time' => $this->start_time,
    //             'end_time' => $this->end_time,
    //             'total_hours' => $this->total_hours,
    //         ]);

    //         $overtimel = AttendanceRecord::findOrFail($this->attendance_id);
    //         $overtimel->update([

    //             'total_hours' => $attendanceRecord->total_hours + $this->total_hours,
    //         ]);
    
       
    //         return redirect()->intended('/admin/attendance')->with('updateDepartment', 'Successfull');
    //     }
    public function render()
    {
        return view('livewire.h-r.add-overtime');
    }
}
