<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class registrosono extends Migration
{
    public function up()
    {
        Schema::create('registrosono', function (Blueprint $table) {
            $table->id();
            $table->string('tempo_sono');
            $table->string('qualidade_sono');
            $table->date('data_registro');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('registrosono');
    }
}

