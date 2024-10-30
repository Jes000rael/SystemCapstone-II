<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceRecord extends Model
{
    use HasFactory;
    protected $fillable = [ 'employee_id',
    'cutoff_id',
    'total_hours',
    'total_break',
    'total_ot',
    'rate',
    'date',
   'duty_start',
    'time_in',
    'time_out',
    'status_id',
    'has_night_diff',];

 

    public function absence()
{
    return $this->hasmany(Absences::class, 'attendance_id');
} 

public function break()
{
    return $this->hasmany(BreaktimeLog::class, 'attendance_id');
} 

public function overtime()
{
    return $this->hasmany(OvertimeLog::class, 'attendance_id');
} 


public function requestTime()
{
    return $this->hasmany(RequestTimeAdjustments::class, 'attendance_id');
} 


public function attendanceStatus()
{
    return $this->belongsTo(AttendanceStatus::class, 'status_id');
} 

public function employee()
{
    return $this->belongsTo(EmployeeRecords::class, 'employee_id');
} 
public function cutoff()
{
    return $this->belongsTo(Cutoff::class, 'cutoff_id');
} 

    public $timestamps = false;
    protected $primaryKey = 'attendance_id';



   
}
