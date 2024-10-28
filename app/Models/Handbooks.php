<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Handbooks extends Model
{
    use HasFactory;
    protected $fillable =[
        'description',
         'link','Date',
    ];
    protected $primaryKey = 'handbook_id';
    public $timestamps = false;


}
