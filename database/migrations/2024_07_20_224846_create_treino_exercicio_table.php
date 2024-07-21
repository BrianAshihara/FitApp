<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreinoExercicioTable extends Migration
{
    public function up()
    {
        Schema::create('treino_exercicio', function (Blueprint $table) {
            $table->id();
            $table->foreignId('treino_id')->constrained('treinos')->onDelete('cascade');
            $table->foreignId('exercicio_id')->constrained('exercicios')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('treino_exercicio');
    }
}
