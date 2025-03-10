<?php


namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Notifications\Notifiable;

class EmployeeRecords extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

     protected $fillable = [
        'employee_id',
        'company_id',
        'first_name',
        'last_name',
        'middle_name',
        'suffix',
        'gender',
        'blood_type',
        'address',
        'seniority_level_id',
        'employment_status_id',
        'job_title_id',
        'department_id',
        'date_of_birth',
        'date_hired',
        'date_start',
        'hourly_rate',
        'has_night_diff',
        'username',
        'password',
        'password_string',
        'contact_number',
        'emergency_contact',
        'emergency_person',
        'relationship',
        'tin',
        'sss',
        'pagibig',
        'philhealth',
        'shift_id',
        'email',
        'status',
        'Date_added',
    ];

   
    public function work_sched()
    {
        return $this->belongsTo(WorkSchedule::class, 'employee_id');
    }
    public function deduction()
{
    return $this->hasmany(Deductions::class, 'employee_id');
}
public function meritLog()
{
    return $this->hasmany(MeritLog::class, 'employee_id');
} 

public function absence()
{
    return $this->hasmany(Absences::class, 'employee_id');
} 

public function attendance()
{
    return $this->hasmany(AttendanceRecord::class, 'employee_id');
} 

public function slip()
{
    return $this->hasmany(Payslip::class, 'employee_id');
} 



public function shift()
{
    return $this->belongsTo(Shift::class, 'shift_id');
} 
    
public function department()
{
    return $this->belongsTo(Department::class, 'department_id');
} 
public function jobtitle()
{
    return $this->belongsTo(JobTitle::class, 'job_title_id');
} 

public function employmentStatus()
{
    return $this->belongsTo(EmploymentStatus::class, 'employment_status_id');
} 

public function seniorityLevel()
{
    return $this->belongsTo(SeniorityLevel::class, 'seniority_level_id');
} 

public function company()
{
    return $this->belongsTo(Company::class, 'company_id');
} 

public function messages()
{
    return $this->hasMany(Message::class, 'employee_id');
}
    public $timestamps = false;
    protected $primaryKey = 'employee_id';



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'Password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}