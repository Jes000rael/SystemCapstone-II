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
            $table->foreignId('employee_id');
            $table->foreignId('cutoff_id');
            $table->Double('total_hours');
            $table->Double('total_break');
            $table->Double('total_ot');
            $table->Double('rate');
            $table->Date('date');
            $table->Time('duty_start');
            $table->timestamp('time_in')->nullable();
            $table->timestamp('time_out')->nullable();
            $table->String('status');
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
