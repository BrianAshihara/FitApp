<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvaliacoesTable extends Migration
{
    public function up()
    {
        Schema::create('avaliacoes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_usuario')->constrained('usuarios')->onDelete('cascade');
            $table->text('comentarios');
            $table->integer('classificacao');
            $table->timestamp('data_avaliacao');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('avaliacoes');
    }
}
