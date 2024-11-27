<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deductions extends Model
{
    use HasFactory;
    protected $fillable = [
'company_id',
'employee_id',
'description',
'value',];


public $timestamps = false;
    protected $primaryKey = 'deductions_id';

    public function employees()
    {
        return $this->belongsTo(EmployeeRecords::class, 'employee_id');
    }
}
