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
        Schema::create('merit_logs', function (Blueprint $table) {
            $table->id('merit_id');
            $table->foreignId('employee_id');
            $table->foreignId('employee_id_from');
            $table->foreignId('merit_category_id');
            $table->string('merit_type_id');
            $table->string('reasons');
            $table->Double('points');
            $table->Date('date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('merit_logs');
    }
};
