<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriaisTable extends Migration
{
    /**
     * Execute as migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materiais', function (Blueprint $table) {
            $table->id(); // cria o campo 'id' como chave primária, que é equivalente ao SERIAL
            $table->string('nome', 100); // cria o campo 'nome' com o tamanho de 100 caracteres
            $table->text('descricao'); // cria o campo 'descricao' como TEXT
            $table->integer('quantidade'); // cria o campo 'quantidade' como INT
            $table->boolean('acesso'); // cria o campo 'acesso' como BIT (em Laravel, usamos boolean)
            $table->timestamps(); // cria os campos 'created_at' e 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materiais');
    }
}
