<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrosAtividadesTable extends Migration
{
    public function up()
    {
        Schema::create('registros_atividades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_usuario')->constrained('usuarios')->onDelete('cascade');
            $table->string('tipo_atividade');
            $table->float('distancia_percorrida');
            $table->integer('duracao_atividade');
            $table->integer('calorias_queimadas');
            $table->timestamp('data_hora_atividade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('registros_atividades');
    }
}
