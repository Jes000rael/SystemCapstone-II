<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EmployeeRecords;
use App\Models\AttendanceRecord;

class Company extends Model
{
    use HasFactory;
    protected $fillable = ['description',
    'timezone',];

    public function employees()
    {
        return $this->hasmany(EmployeeRecords::class, 'company_id');
    }
  
    public function attendance()
    {
        return $this->hasmany(AttendanceRecord::class, 'company_id');
    }
   
    


    public $timestamps = false;
    protected $primaryKey = 'company_id';

}
