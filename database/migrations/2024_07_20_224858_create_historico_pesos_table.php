<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoricoPesosTable extends Migration
{
    public function up()
    {
        Schema::create('historico_pesos', function (Blueprint $table) {
            $table->id();
            //$table->unsignedBigInteger('id_usuario');
            $table->foreignId('id_usuario')->constrained('usuarios')->onDelete('cascade');
            $table->float('peso');
            $table->timestamp('data_hora_registro');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('historico_pesos');
    }
}
