<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payslip extends Model
{
    use HasFactory;
    protected $fillable = [ 'company_id', 'employee_id',
    'cutoff_id',
    'hours_rendered',
    'ot_rendered',
    'total_deduction',
    'total_pay',];

    public function attendance()
{
    return $this->hasmany(AttendanceRecord::class, 'attendance_id');
} 

public function cutoff()
{
    return $this->belongsTo(Cutoff::class, 'cutoff_id');
} 

public function employeeRec()
{
    return $this->hasmany(EmployeeRecords::class, 'employee_id');
} 
public function company()
{
    return $this->belongsTo(Company::class, 'company_id');
} 
    public $timestamps = false;
    protected $primaryKey = 'payslip_id';


   
}
