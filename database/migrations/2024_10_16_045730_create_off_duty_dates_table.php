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
        Schema::create('off_duty_dates', function (Blueprint $table) {
            $table->id('holiday_id');
            $table->foreignId('category_id');
            $table->String('description');
            $table->Date('date');
            $table->Double('percentage');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('off_duty_dates');
    }
};
