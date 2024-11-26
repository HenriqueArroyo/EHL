<?php

namespace Tests\Feature;

use App\Models\Funcionario;
use App\Models\Gestor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class FuncionarioControllerTest extends TestCase
{
    use RefreshDatabase;

    // Teste para verificar a listagem de funcionários
   // Teste para verificar a listagem de funcionários
// public function test_index_deve_retornar_funcionarios()
// {
//     // Cria um gestor com os campos necessários
//     $gestor = Gestor::factory()->create([
//         'nome' => 'Gestor Teste', // Defina o campo 'nome' que está faltando
//     ]);

//     // Simula a autenticação do gestor
//     Auth::login($gestor);

//     // Cria alguns funcionários
//     Funcionario::factory()->count(3)->create(['id_gestor' => $gestor->id]);

//     // Acessa a rota index do controlador
//     $response = $this->get(route('funcionarios.index'));

//     // Verifica se a resposta contém os dados dos funcionários
//     $response->assertStatus(200);
//     $response->assertViewHas('funcionarios');
//     $response->assertViewIs('funcionarios.index');
//     $response->assertSee('Funcionario');  // Se existe algum dado de funcionario
// }

    // // Teste para criar um novo funcionário
    // public function test_create_deve_exibir_formulario_de_criacao()
    // {
    //     // Simula um gestor autenticado
    //     $gestor = Gestor::factory()->create();
    //     Auth::login($gestor);

    //     // Acessa a rota create do controlador
    //     $response = $this->get(route('funcionarios.create'));

    //     // Verifica se a resposta foi bem sucedida e se o formulário está visível
    //     $response->assertStatus(200);
    //     $response->assertViewHas('gestores');
    //     $response->assertViewIs('funcionarios.create');
    // }

    // Teste para armazenar um novo funcionário
    public function test_store_deve_criar_funcionario()
    {
        // Simula um gestor autenticado
        $gestor = Gestor::factory()->create();
        Auth::login($gestor);

        // Dados do novo funcionário
        $data = [
            'nome' => 'Funcionario Teste',
            'email' => 'funcionario@teste.com',
            'senha' => 'senha123',
            'cpf' => '12345678901',
            'dataNascimento' => '1990-01-01',
            'id_gestor' => $gestor->id,
        ];

        // Acessa a rota store do controlador
        $response = $this->post(route('funcionarios.store'), $data);

        // Verifica se o funcionário foi criado e se a resposta foi bem sucedida
        $response->assertRedirect(route('funcionarios.index'));
        $this->assertDatabaseHas('funcionarios', ['email' => 'funcionario@teste.com']);
    }

    // Teste para editar um funcionário
    // public function test_edit_deve_exibir_formulario_de_edicao()
    // {
    //     // Simula um gestor autenticado
    //     $gestor = Gestor::factory()->create();
    //     Auth::login($gestor);

    //     // Cria um funcionário
    //     $funcionario = Funcionario::factory()->create(['id_gestor' => $gestor->id]);

    //     // Acessa a rota edit do controlador
    //     $response = $this->get(route('funcionarios.edit', $funcionario->id));

    //     // Verifica se a resposta foi bem sucedida e se o formulário está visível
    //     $response->assertStatus(200);
    //     $response->assertViewHas('funcionario');
    //     $response->assertViewIs('funcionarios.edit');
    // }

    // // Teste para atualizar um funcionário
    // public function test_update_deve_atualizar_funcionario()
    // {
    //     // Simula um gestor autenticado
    //     $gestor = Gestor::factory()->create();
    //     Auth::login($gestor);

    //     // Cria um funcionário
    //     $funcionario = Funcionario::factory()->create(['id_gestor' => $gestor->id]);

    //     // Dados atualizados do funcionário
    //     $data = [
    //         'nome' => 'Funcionario Atualizado',
    //         'email' => 'funcionario@atualizado.com',
    //         'senha' => 'senha456',
    //         'cpf' => '98765432100',
    //         'dataNascimento' => '1992-05-15',
    //     ];

    //     // Acessa a rota update do controlador
    //     $response = $this->put(route('funcionarios.update', $funcionario->id), $data);

    //     // Verifica se a atualização foi bem sucedida e se os dados foram atualizados no banco
    //     $response->assertRedirect(route('funcionarios.index'));
    //     $this->assertDatabaseHas('funcionarios', ['email' => 'funcionario@atualizado.com']);
    // }

    // // Teste para deletar um funcionário
    // public function test_destroy_deve_deletar_funcionario()
    // {
    //     // Simula um gestor autenticado
    //     $gestor = Gestor::factory()->create();
    //     Auth::login($gestor);

    //     // Cria um funcionário
    //     $funcionario = Funcionario::factory()->create(['id_gestor' => $gestor->id]);

    //     // Acessa a rota destroy do controlador
    //     $response = $this->delete(route('funcionarios.destroy', $funcionario->id));

    //     // Verifica se o funcionário foi deletado
    //     $response->assertRedirect(route('funcionarios.index'));
    //     $this->assertDatabaseMissing('funcionarios', ['id' => $funcionario->id]);
    // }
}
