<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OffDutyDates extends Model
{
    use HasFactory;
    protected $fillable = ['category_id','description','date','percentage',];

    public function OffDuty()
    {
        return $this->belongsTo(OffDutyCategory::class, 'category_id');
    } 
    public $timestamps = false;
    protected $primaryKey = 'holiday_id';

    
}
