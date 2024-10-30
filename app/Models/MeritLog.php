<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeritLog extends Model
{
    use HasFactory;
    protected $fillable = [  'employee_id',
    'employee_id_from',
    'merit_category_id',
    'merit_type_id',
    'reasons',
    'points',
    'date',];

    public function meritCategory()
{
    return $this->belongsTo(MeritCategory::class, 'merit_category_id');
}

public function meritType()
{
    return $this->belongsTo(MeritType::class, 'merit_type_id');
}
    public $timestamps = false;
    protected $primaryKey = 'merit_id';



  
}
