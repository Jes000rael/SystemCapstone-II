<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payslip extends Model
{
    use HasFactory;
    protected $fillable = [ 'employee_id',
    'cutoff_id',
    'hours_rendered',
    'oT_rendered',
    'total_deduction',
    'total_pay',];

    public function attendance()
{
    return $this->hasmany(AttendanceRecord::class, 'attendance_id');
} 

public function cutoff()
{
    return $this->hasmany(Cutoff::class, 'cutoff_id');
} 
    public $timestamps = false;
    protected $primaryKey = 'payslip_id';


   
}
