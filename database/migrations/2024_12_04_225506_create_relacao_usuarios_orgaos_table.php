<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelacaoUsuariosOrgaosTable extends Migration
{
    public function up()
    {
        Schema::create('relacao_usuarios_orgaos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_orgao');
            $table->enum('tipo', ['Doador', 'Receptor']);
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('usuarios')->onDelete('cascade');
            $table->foreign('id_orgao')->references('id')->on('orgaos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('relacao_usuarios_orgaos');
    }
}
