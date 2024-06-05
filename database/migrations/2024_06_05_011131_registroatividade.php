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
        Schema::create('registroatividade', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_atividade');
            $table->float('distancia_percorrida');
            $table->date_time('duracao_atividade');
            $table->int('calorias_queimadas');
            $table->int('data_hora_atividade');
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
