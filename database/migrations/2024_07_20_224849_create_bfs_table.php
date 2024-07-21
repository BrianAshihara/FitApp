<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBfsTable extends Migration
{
    public function up()
    {
        Schema::create('bfs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_usuario')->constrained('usuarios')->onDelete('cascade');
            $table->float('quantidade_gordura');
            $table->timestamp('data_medicao');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bfs');
    }
}
