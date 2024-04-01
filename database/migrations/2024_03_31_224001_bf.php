<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class bf extends Migration
{
    public function up()
    {
        Schema::create('bf', function (Blueprint $table) {
            $table->id();
            $table->string('quantidade_gordura');
            $table->string('data_medicao');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('registrosono');
    }
}

