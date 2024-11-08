<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriaisTable extends Migration
{
    public function up()
    {
        Schema::create('materiais', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->text('descricao');
            $table->boolean('acesso');  // Tipo BIT convertido para booleano em Laravel
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('materiais');
    }
}
