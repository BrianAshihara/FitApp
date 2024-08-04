<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExemplosTable extends Migration
{
    public function up()
    {
        Schema::create('exemplos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_usuario')->constrained('usuarios')->onDelete('cascade');
            $table->float('comida_fav');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('exemplos');
    }
}
