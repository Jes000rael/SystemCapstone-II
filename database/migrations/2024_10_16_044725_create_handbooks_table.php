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
        Schema::create('handbooks', function (Blueprint $table) {
            
            $table->id('handbook_id');
            $table->foreignId('company_id'); 
            $table->Text('description');
            $table->Text('link');
            $table->timestamp('date');

       
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('handbooks');
    }
};
