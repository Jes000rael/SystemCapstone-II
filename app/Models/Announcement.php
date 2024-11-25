<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;
    protected $fillable = ['description','company_id','date',];
    public $timestamps = false;
    protected $primaryKey = 'announcement_id';

}
