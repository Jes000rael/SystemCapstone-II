<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceStatus extends Model
{
    use HasFactory;

    protected $fillable = [ 'description',
    'min',
    'max',
 ];


 public $timestamps = false;
 protected $primaryKey = 'status_id';
}
