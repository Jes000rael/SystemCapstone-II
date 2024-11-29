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
            $table->Time('monday_in')->nullable();
            $table->Time('monday_out')->nullable();
            $table->Time('tuesday_in')->nullable();
            $table->Time('tuesday_out')->nullable();
            $table->Time('wednesday_in')->nullable();
            $table->Time('wednesday_out')->nullable();
            $table->Time('thursday_in')->nullable();
            $table->Time('thursday_out')->nullable();
            $table->Time('friday_in')->nullable();
            $table->Time('friday_out')->nullable();
            $table->Time('saturday_in')->nullable();
            $table->Time('saturday_out')->nullable();
            $table->Time('sunday_in')->nullable();
            $table->Time('sunday_out')->nullable();
            $table->foreignId('updated_by');
            $table->timestamp('update_on');

           
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
