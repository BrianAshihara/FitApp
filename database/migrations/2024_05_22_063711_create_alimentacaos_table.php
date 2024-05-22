<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('alimentacao', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_refeicao');
            $table->string('alimentos_consumidos');
            $table->string('quantidade_calorica');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('alimentacao');
    }
};
