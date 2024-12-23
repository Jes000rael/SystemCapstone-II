<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cutoff extends Model
{
    use HasFactory;
    protected $fillable = ['date_start',
    'date_end',
    'company_id',
    'conversion_rate',];
    public $timestamps = false;
    protected $primaryKey = 'cutoff_id';

    
    public function attendanceRecords()
{
    return $this->hasMany(AttendanceRecord::class,  'cutoff_id');
}

}
