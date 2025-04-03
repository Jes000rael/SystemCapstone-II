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
        Schema::create('overtime_logs', function (Blueprint $table) {
            $table->id('overtime_id');
            $table->foreignId('cutoff_id');
            $table->foreignId('attendance_id');
            $table->foreignId('employee_id');
            $table->timestamp('start_time')->nullable();
            $table->timestamp('end_time')->nullable();

            $table->Time('total_hours')->nullable();
            $table->String('field')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('overtime_logs');
    }
};
