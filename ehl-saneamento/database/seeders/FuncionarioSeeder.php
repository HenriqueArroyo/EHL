<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Funcionario;
use App\Models\Gestor; // Modelo Gestor
use Illuminate\Support\Facades\Hash;

class FuncionarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Verifica se existem gestores para associar aos funcionários
        $gestores = Gestor::all();

        if ($gestores->isEmpty()) {
            // Caso não existam gestores, não faz a inserção de funcionários
            echo "Não há gestores para associar aos funcionários. Primeiro crie gestores.\n";
            return;
        }

        // Criar funcionários com dados específicos
        Funcionario::create([
            'nome' => 'João Silva',
            'email' => 'joao.silva@empresa.com',
            'senha' => Hash::make('senha123'),
            'cpf' => '123.456.789-01',
            'dataNascimento' => '1985-10-20',
            'id_gestor' => $gestores->first()->id, // Associando ao primeiro gestor
        ]);

        Funcionario::create([
            'nome' => 'Maria Oliveira',
            'email' => 'maria.oliveira@empresa.com',
            'senha' => Hash::make('senha123'),
            'cpf' => '987.654.321-00',
            'dataNascimento' => '1990-05-15',
            'id_gestor' => $gestores->first()->id, // Associando ao primeiro gestor
        ]);

        Funcionario::create([
            'nome' => 'Carlos Pereira',
            'email' => 'carlos.pereira@empresa.com',
            'senha' => Hash::make('senha123'),
            'cpf' => '111.222.333-44',
            'dataNascimento' => '1992-03-30',
            'id_gestor' => $gestores->skip(1)->first()->id, // Associando ao segundo gestor
        ]);

        Funcionario::create([
            'nome' => 'Ana Costa',
            'email' => 'ana.costa@empresa.com',
            'senha' => Hash::make('senha123'),
            'cpf' => '555.666.777-88',
            'dataNascimento' => '1988-12-10',
            'id_gestor' => $gestores->skip(1)->first()->id, // Associando ao segundo gestor
        ]);

        Funcionario::create([
            'nome' => 'Lucas Almeida',
            'email' => 'lucas.almeida@empresa.com',
            'senha' => Hash::make('senha123'),
            'cpf' => '333.444.555-66',
            'dataNascimento' => '1995-07-25',
            'id_gestor' => $gestores->last()->id, // Associando ao último gestor
        ]);

        echo "Funcionários criados com sucesso!\n";
    }
}
