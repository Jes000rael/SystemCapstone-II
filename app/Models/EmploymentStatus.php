<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploymentStatus extends Model
{
    use HasFactory;
    protected $fillable = ['description'];
    public $timestamps = false;
    protected $primaryKey = 'employment_status_id';



}
