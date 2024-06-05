<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class registroatividade extends Migration
{
    public function up()
    {
        Schema::create('registroatividade', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_atividade');
            $table->float('distancia_percorrida');
            $table->date('duracao_atividade');
            $table->integer('calorias_queimadas');
            $table->integer('data_hora_atividade');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       Schema::dropIfExists('registroatividade');
    }
};
