<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploymentStatus extends Model
{
    use HasFactory;
    protected $fillable = ['description','company_id'];
    public function company()
{
    return $this->belongsTo(Company::class, 'company_id');
} 
    
    public $timestamps = false;
    protected $primaryKey = 'employment_status_id';



}
