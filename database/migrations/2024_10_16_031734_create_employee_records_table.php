<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employee_records', function (Blueprint $table) {
            $table->id('employee_id');
            $table->foreignId('company_id'); 
            $table->string('first_name'); 
            $table->string('last_name'); 
            $table->string('middle_name')->nullable();
            $table->string('suffix')->nullable();
            $table->string('blood_type')->nullable();
            $table->string('address')->nullable();
            $table->foreignId('seniority_level'); 
            $table->foreignId('employment_status_id'); 
            $table->foreignId('job_title_id'); 
            $table->foreignId('department_title'); 
            $table->date('date_of_birth'); 
            $table->date('date_hired'); 
            $table->date('date_start'); 
            $table->double('hourly_rate'); 
            $table->boolean('has_night_diff')->default(false); 
            $table->string('username')->unique();
            $table->string('password');
            $table->string('password_string')->nullable();
            $table->integer('contact_number'); 
            $table->integer('emergency_contact'); 
            $table->string('emergency_person'); 
            $table->string('relationship')->nullable();
            $table->string('tin')->nullable();
            $table->string('sss')->nullable();
            $table->string('pagibig')->nullable();
            $table->string('philhealth')->nullable();
            $table->timestamp('date_added');
            $table->foreignId('shift_id');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_records');
    }
};
