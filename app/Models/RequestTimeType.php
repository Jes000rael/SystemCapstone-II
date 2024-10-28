<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestTimeType extends Model
{
    use HasFactory;
    protected $fillable = ['description'];
    public $timestamps = false;
    protected $primaryKey = 'request_type_id';


}
