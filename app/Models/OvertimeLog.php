<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OvertimeLog extends Model
{
    use HasFactory;
    protected $fillable = [ 'attendance_id',
    'start_time',
    'end_time',
    'total_hours',
    'field',];

  
    public $timestamps = false;
    protected $primaryKey = 'overtime_id';


    public function attendanceRecords()
    {
        return $this->belongsTo(AttendanceRecord::class, 'attendance_id');
    }
}
