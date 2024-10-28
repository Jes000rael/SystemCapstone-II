<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OffDutyDates extends Model
{
    use HasFactory;
    protected $fillable = ['field','description','date','percentage',];
    public $timestamps = false;
    protected $primaryKey = 'holiday_id';

    
}
