<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerfisTable extends Migration
{
    public function up()
    {
        Schema::create('perfis', function (Blueprint $table) {
            $table->id();
            $table->string('descricao')->unique(); // Administrador, Receptor, Doador
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('perfis');
    }
}
