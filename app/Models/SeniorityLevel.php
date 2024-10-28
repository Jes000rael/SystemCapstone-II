<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeniorityLevel extends Model
{
    use HasFactory;
    protected $fillable = ['description'];
    public $timestamps = false;
    protected $primaryKey = 'seniority_level_id';


}
