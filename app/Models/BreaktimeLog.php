<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BreaktimeLog extends Model
{
    use HasFactory;
    protected $fillable = [ 
        'attendance_id',
    'total_hours','field', 'start_time',
    'end_time',];
    public $timestamps = false;
    protected $primaryKey = 'breaktime_id';


   
}
