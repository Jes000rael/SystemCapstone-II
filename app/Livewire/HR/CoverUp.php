<?php

namespace App\Livewire\HR;

use Livewire\Component;

use App\Models\AttendanceRecord;
use App\Models\OvertimeLog;
use App\Models\RequestTimeType;
use App\Models\AttendanceStatus;
use App\Models\RequestTimeAdjustments;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

use Carbon\Carbon;

class CoverUp extends Component
{
    public $timetype,$attendance_id;
    public $start_time ='',$end_time='',$total_hours='',$reason='',$request_type_id='',$attendanceStatus='',$status_id='';

    protected $rules = [
        'request_type_id' => 'required',
        'status_id' => 'required',
        'start_time' => 'required|date',
        'end_time' => 'required|date|after_or_equal:start_time',
        'total_hours' => 'required|numeric|min:0',
        'reason' => 'required|string|max:255',
    ];
    
    public function mount($attendanceID)
    {
        $this->loadDropdownData();
        try {
       
            $decryptedattendanceID = Crypt::decrypt($attendanceID);

            $existingSchedule = RequestTimeAdjustments::where('attendance_id', $decryptedattendanceID)->first();

            if ($existingSchedule) {
                return redirect()->intended('/admin/attendance')->with('employee_has', 'Successfully');
            }else{
                
                $timeadjust = AttendanceRecord::findOrFail($decryptedattendanceID);

            $this->attendance_id = $timeadjust->attendance_id;
            }
     
            
         
        } catch (DecryptException $e) {
         
            session()->flash('error', 'Invalid or corrupted ID.');
        } catch (ModelNotFoundException $e) {
        
            session()->flash('error', 'Attendance ID not found.');
        } catch (\Exception $e) {
          
            session()->flash('error', 'An unexpected error occurred: ' . $e->getMessage());
        }

        
    
    }
  
    public function loadDropdownData()
        {
            $this->timetype = RequestTimeType::get();
            $this->attendanceStatus = AttendanceStatus:: whereNotIn('status_id', [1, 2])
            ->get();
        }


        public function cover_up_time()
        {
            $this->validate();

            $employee = AttendanceRecord::findOrFail($this->attendance_id);
            $employee->update([
                'time_in' => $this->start_time,
                'time_out' => $this->end_time,
                'total_hours' => $this->total_hours,
                'status_id' => $this->status_id,
                
            ]);
            RequestTimeAdjustments::create([
                'company_id' => Auth::user()->company_id,
                'attendance_id' =>$this->attendance_id,
                'request_type_id' =>$this->request_type_id,
                'start_time' => $this->start_time,
                'end_time' => $this->end_time,
                'total_hours' => $this->total_hours,
                'reason' => $this->reason,
            ]);
    
       
            return redirect()->intended('/admin/attendance')->with('adjustmenttime', 'Successfull');
        }

    public function render()
    {
        return view('livewire.h-r.cover-up');
    }
}
