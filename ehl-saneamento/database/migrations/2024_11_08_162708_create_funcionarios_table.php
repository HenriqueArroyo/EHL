// database/migrations/xxxx_xx_xx_xxxxxx_create_funcionarios_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncionariosTable extends Migration
{
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 60);
            $table->string('email', 125)->unique();
            $table->string('senha', 50);
            $table->string('cpf', 14)->unique();
            $table->date('dataNascimento');
            $table->unsignedBigInteger('id_gestor')->nullable();
            $table->foreign('id_gestor')->references('id')->on('gestores')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('funcionarios');
    }
}
