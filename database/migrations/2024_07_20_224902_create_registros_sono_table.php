<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrosSonoTable extends Migration
{
    public function up()
    {
        Schema::create('registros_sono', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_usuario')->constrained('usuarios')->onDelete('cascade');
            $table->integer('tempo_sono');
            $table->integer('qualidade_sono');
            $table->timestamp('data_registro');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('registros_sono');
    }
}
