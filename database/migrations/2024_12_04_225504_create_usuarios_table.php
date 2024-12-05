<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('senha');
            $table->unsignedBigInteger('id_endereco')->nullable();
            $table->unsignedBigInteger('id_perfil');
            $table->timestamps();
        
            $table->foreign('id_endereco')->references('id')->on('enderecos')->onDelete('set null');
            $table->foreign('id_perfil')->references('id')->on('perfis')->onDelete('cascade');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
