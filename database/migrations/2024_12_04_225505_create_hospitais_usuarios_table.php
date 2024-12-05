<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospitaisUsuariosTable extends Migration
{
    public function up()
    {
        Schema::create('hospitais_usuarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_hospital');
            $table->unsignedBigInteger('id_user');
            $table->timestamps();

            $table->foreign('id_hospital')->references('id')->on('hospitais')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('usuarios')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('hospitais_usuarios');
    }
}
