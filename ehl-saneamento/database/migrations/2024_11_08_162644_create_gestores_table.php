// database/migrations/xxxx_xx_xx_xxxxxx_create_gestores_table.php
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGestoresTable extends Migration
{
    public function up()
    {
        Schema::create('gestores', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 60);
            $table->string('cpf', 14)->unique();
            $table->string('email', 125)->unique();
            $table->string('senha', 50);
            $table->timestamps();  // Cria created_at e updated_at automaticamente
        });
    }

    public function down()
    {
        Schema::dropIfExists('gestores');
    }
}
