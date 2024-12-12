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
        Schema::create('attendance_records', function (Blueprint $table) {
            $table->id('attendance_id');
            $table->foreignId('company_id');
            $table->foreignId('employee_id');
            $table->foreignId('cutoff_id');
            $table->Double('total_hours')->nullable();
            $table->Double('total_break')->nullable();
            $table->Double('total_ot')->nullable();
            $table->Double('rate')->nullable();
            $table->Date('date')->nullable();
            $table->Time('duty_start')->nullable();
            $table->Time('duty_end')->nullable();
            $table->timestamp('time_in');
            $table->timestamp('time_out')->nullable();
            $table->foreignId('status_id');
            $table->Boolean('has_night_diff');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance_records');
    }
};
