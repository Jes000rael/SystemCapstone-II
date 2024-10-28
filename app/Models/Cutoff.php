<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cutoff extends Model
{
    use HasFactory;
    protected $fillable = ['date_start',
    'date_end',
    'conversion_rate',];
    public $timestamps = false;
    protected $primaryKey = 'cutoff_id';

    
    
}
