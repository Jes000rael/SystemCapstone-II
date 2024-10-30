<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkSchedule extends Model
{
    use HasFactory;
    protected $fillable =[
        'employee_id',
        'monday_in',
        'monday_out',
        'tuesday_in',
        'tuesday_out',
        'wednesday_in',
        'wednesday_out',
        'thursday_in',
        'thursday_out',
        'friday_in',
        'friday_out',
        'saturday_in',
        'saturday_out',
        'sunday_in',
        'sunday_out',
        'updated_by','update_on',
    ];

    public function employee()
{
    return $this->belongsTo(EmployeeRecords::class, 'employee_id');
} 
    public $timestamps = false;
    protected $primaryKey = 'work_schedule_id';

}
