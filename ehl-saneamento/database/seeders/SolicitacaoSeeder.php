<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Funcionario;
use App\Models\Material;
use App\Models\Solicitacao;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SolicitacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Criando uma instância do Faker para gerar dados aleatórios
        $faker = Faker::create();

        // Obtendo os funcionários e materiais existentes
        $funcionarios = Funcionario::all();
        $materiais = Material::all();

        // Verifica se existem funcionários e materiais para associar
        if ($funcionarios->isEmpty() || $materiais->isEmpty()) {
            echo "Funcionários ou materiais não encontrados. Popule as tabelas antes de rodar o seeder.\n";
            return;
        }

        // Gerando um número aleatório de solicitações entre 5 a 15
        $numeroDeSolicitacoes = rand(5, 15);

        // Criando as solicitações
        for ($i = 0; $i < $numeroDeSolicitacoes; $i++) {
            // Seleciona um funcionário e material aleatoriamente
            $funcionario = $funcionarios->random();
            $material = $materiais->random();

            // Gerando dados aleatórios para a solicitação
            $quantidade = rand(1, 5); // Quantidade solicitada entre 1 e 5
            $status = $material->acesso ? 'Aprovado' : 'Requisitado'; // Status baseado no 'acesso' do material
            $dataSolicitacao = $faker->dateTimeThisYear(); // Data aleatória de solicitação

            // Verificando se o status é aprovado e se a quantidade solicitada é maior que o estoque
            if ($status === 'Aprovado' && $material->quantidade < $quantidade) {
                continue; // Pula a solicitação se o estoque for insuficiente
            }

            // Criando a solicitação
            Solicitacao::create([
                'id_funcionario' => $funcionario->id,
                'id_material' => $material->id,
                'dataSolicitacao' => $dataSolicitacao,
                'quantidade' => $quantidade,
                'status' => $status,
                'dataDevolucao' => null, // Definido como null inicialmente
            ]);

            // Se o status for 'Aprovado', atualiza a quantidade do material
            if ($status === 'Aprovado') {
                $material->quantidade -= $quantidade;
                $material->save();
            }
        }

        echo "Solicitações criadas com sucesso!\n";
    }
}
