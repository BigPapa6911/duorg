<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use illuminate\Support\Facades\Schema;



return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('donors_info', function (Blueprint $table) {
            $table->id();
            $table->enum('blood_type', [
                'A+', 'A-',
                'B+', 'B-',
                'AB+', 'AB-',
                'O+', 'O-'
            ]);
            $table->boolean('rh_factor');
            $table->boolean('alcohol_consumer');
            $table->boolean('smoker');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('donors_info');
    }
};
