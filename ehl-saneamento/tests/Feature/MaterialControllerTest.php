<?php

namespace Tests\Feature;

use App\Models\Material;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class MaterialControllerTest extends TestCase
{
    use RefreshDatabase;

    // // Teste para verificar a listagem de materiais
    // public function test_index_deve_retornar_materiais()
    // {
    //     // Cria alguns materiais
    //     Material::factory()->count(3)->create();

    //     // Acessa a rota index do controlador
    //     $response = $this->get(route('materiais.index'));

    //     // Verifica se a resposta foi bem sucedida e se os materiais estão presentes na view
    //     $response->assertStatus(200);
    //     $response->assertViewHas('materiais');
    //     $response->assertViewIs('materiais.index');
    // }

    // Teste para exibir o formulário de cadastro de material
    public function test_create_deve_exibir_formulario_de_criacao()
    {
        // Acessa a rota create do controlador
        $response = $this->get(route('materiais.create'));

        // Verifica se a resposta foi bem sucedida e se o formulário de criação está presente
        $response->assertStatus(200);
        $response->assertViewIs('materiais.create');
    }

    // Teste para armazenar um novo material
    public function test_store_deve_criar_material()
    {
        // Dados para criação do material
        $data = [
            'nome' => 'Material Teste',
            'descricao' => 'Descrição do material de teste',
            'quantidade' => 10,
            'acesso' => true,
        ];

        // Acessa a rota store do controlador
        $response = $this->post(route('materiais.store'), $data);

        // Verifica se o material foi criado e se a resposta foi bem sucedida
        $response->assertRedirect(route('materiais.index'));
        $this->assertDatabaseHas('materiais', ['nome' => 'Material Teste']);
    }

    // // Teste para exibir o formulário de edição de material
    // public function test_edit_deve_exibir_formulario_de_edicao()
    // {
    //     // Cria um material
    //     $material = Material::factory()->create();

    //     // Acessa a rota edit do controlador
    //     $response = $this->get(route('materiais.edit', $material->id));

    //     // Verifica se a resposta foi bem sucedida e se o formulário de edição está presente
    //     $response->assertStatus(200);
    //     $response->assertViewIs('materiais.edit');
    //     $response->assertViewHas('material');
    // }

    // // Teste para atualizar um material
    // public function test_update_deve_atualizar_material()
    // {
    //     // Cria um material
    //     $material = Material::factory()->create();

    //     // Dados atualizados para o material
    //     $data = [
    //         'nome' => 'Material Atualizado',
    //         'descricao' => 'Descrição do material atualizado',
    //         'quantidade' => 20,
    //         'acesso' => false,
    //     ];

    //     // Acessa a rota update do controlador
    //     $response = $this->put(route('materiais.update', $material->id), $data);

    //     // Verifica se a atualização foi bem sucedida
    //     $response->assertRedirect(route('materiais.index'));
    //     $this->assertDatabaseHas('materiais', ['nome' => 'Material Atualizado']);
    // }

    // // Teste para excluir um material
    // public function test_destroy_deve_deletar_material()
    // {
    //     // Cria um material
    //     $material = Material::factory()->create();

    //     // Acessa a rota destroy do controlador
    //     $response = $this->delete(route('materiais.destroy', $material->id));

    //     // Verifica se o material foi excluído com sucesso
    //     $response->assertRedirect(route('materiais.index'));
    //     $this->assertDatabaseMissing('materiais', ['id' => $material->id]);
    // }

    // // Teste para visualizar materiais no contexto de funcionários
    // public function test_view_funcionario_deve_exibir_materiais()
    // {
    //     // Cria alguns materiais
    //     Material::factory()->count(3)->create();

    //     // Acessa a rota de visualização de materiais no contexto de funcionários
    //     $response = $this->get(route('funcionarios.visualizarMateriais'));

    //     // Verifica se a resposta foi bem sucedida e se os materiais estão presentes na view
    //     $response->assertStatus(200);
    //     $response->assertViewHas('materiais');
    //     $response->assertViewIs('funcionarios.visualizarMateriais');
    // }
}
