<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitacoesTable extends Migration
{
    public function up()
    {
        Schema::create('solicitacoes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_funcionario');
            $table->unsignedBigInteger('id_material');
            $table->date('dataSolicitacao');
            $table->integer('quantidade');
            $table->string('status', 20);
            $table->date('dataDevolucao')->nullable();  // A data de devolução pode ser null
            $table->timestamps();

            // Definindo as chaves estrangeiras
            $table->foreign('id_funcionario')->references('id')->on('funcionarios')->onDelete('cascade');
            $table->foreign('id_material')->references('id')->on('materiais')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('solicitacoes');
    }
}
