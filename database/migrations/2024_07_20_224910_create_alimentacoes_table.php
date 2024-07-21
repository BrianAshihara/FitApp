<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlimentacoesTable extends Migration
{
    public function up()
    {
        Schema::create('alimentacoes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_usuario')->constrained('usuarios')->onDelete('cascade');
            $table->string('tipo_refeicao');
            $table->text('alimentos_consumidos');
            $table->integer('quantidade_calorica');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('alimentacoes');
    }
}
