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
        Schema::create('request_time_adjustments', function (Blueprint $table) {
            $table->id('time_adjusment_id');
            $table->foreignId('attendance_id');
            $table->foreignId('request_type_id');
            $table->timestamp('start_time')->nullable();
            $table->timestamp('end_time')->nullable();


            $table->time('total_hours');
            $table->string('reason');
         
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_time_adjustments');
    }
};
