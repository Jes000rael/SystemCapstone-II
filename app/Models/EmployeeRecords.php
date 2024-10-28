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
        'company_id',
        'first_name',
        'last_name',
        'middle_name',
        'suffix',
        'blood_type',
        'address',
        'seniority_level',
        'employment_status_id',
        'job_title_id',
        'department_title',
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
        'shift_id','Date_added',
    ];
    public function work_sched()
    {
        return $this->hasmany(WorkSchedule::class, 'employee_id');
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

    

    public $timestamps = false;


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