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
        Schema::create('receivers_info', function (Blueprint $table) {
            $table->id();
            $table->enum('blood_type', [
                'A+', 'A-',
                'B+', 'B-',
                'AB+', 'AB-',
                'O+', 'O-'
            ]);
            $table->string('required_organ'); // Nome do órgão que o receptor precisa
            $table->boolean('emergency')->default(false); // Indica se o receptor está em estado de emergência
            $table->timestamp('added_to_waitlist')->nullable(); // Data de entrada na lista de espera
            $table->boolean('active')->default(true); // Indica se ainda está na lista de espera
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Relacionamento com o usuário
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receivers_info');
    }
};
