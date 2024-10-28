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
        Schema::create('work_schedules', function (Blueprint $table) {
            $table->id('work_schedule_id');
            $table->foreignId('employee_id');
            $table->Time('monday_in');
            $table->Time('monday_out');
            $table->Time('tuesday_in');
            $table->Time('tuesday_out');
            $table->Time('wednesday_in');
            $table->Time('wednesday_out');
            $table->Time('thursday_in');
            $table->Time('thursday_out');
            $table->Time('friday_in');
            $table->Time('friday_out');
            $table->Time('saturday_in')->nullable();
            $table->Time('saturday_out')->nullable();
            $table->Time('sunday_in')->nullable();
            $table->Time('sunday_out')->nullable();
            $table->foreignId('updated_by');
            $table->timestamp('update_on')->nullable();

           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_schedules');
    }
};
