<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EmployeeRecords;


class Message extends Model
{
    use HasFactory;
    protected $fillable = [
        'chatmessage','company_id','employee_id','useremployee_id'];

    public function employee()
    {
        return $this->belongsTo(EmployeeRecords::class, 'employee_id');
    }
  
}
