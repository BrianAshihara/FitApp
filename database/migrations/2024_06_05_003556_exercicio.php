<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('exercicio', function (Blueprint $table) {
            $table->id();
            $table->string('nome_exercicio');
            $table->string('tipo_exercicio');
            $table->string('descricao');
            $table->string('grupo_muscular');
            $table->string('dificuldade');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('exercicio');
    }
};

