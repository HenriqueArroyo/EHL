<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    // Exibe o formulário de cadastro
    public function create()
    {
        return view('materiais.create');
    }

    // Salva os dados do material no banco de dados
    public function store(Request $request)
    {
        // Validação dos dados
        $validated = $request->validate([
            'nome' => 'required|string|max:100',
            'descricao' => 'required|string',
            'quantidade' => 'required|integer',
            'acesso' => 'required|boolean',
        ]);

        // Criação do material
        Material::create($validated);

        // Redireciona para a página de listagem de materiais
        return redirect()->route('materiais.index')->with('success', 'Material cadastrado com sucesso!');
    }

    // Lista todos os materiais cadastrados
    public function index()
    {
        // Obtém todos os materiais do banco de dados
        $materiais = Material::all();

        // Retorna a view de listagem passando os materiais
        return view('materiais.index', compact('materiais'));
    }

    public function viewFuncionario()
    {
        // Obtém todos os materiais do banco de dados
        $materiais = Material::all();

        // Retorna a view de listagem passando os materiais
        return view('funcionarios.visualizarMateriais', compact('materiais'));
    }

    // Exibe o formulário de edição de um material
    public function edit($id)
    {
        $material = Material::findOrFail($id);
        return view('materiais.edit', compact('material'));
    }

    // Atualiza os dados de um material no banco de dados
    public function update(Request $request, $id)
    {
        // Validação dos dados
        $validated = $request->validate([
            'nome' => 'required|string|max:100',
            'descricao' => 'required|string',
            'quantidade' => 'required|integer',
            'acesso' => 'required|boolean',
        ]);

        // Encontrar o material e atualizar
        $material = Material::findOrFail($id);
        $material->update($validated);

        // Redireciona de volta para a listagem com uma mensagem de sucesso
        return redirect()->route('materiais.index')->with('success', 'Material atualizado com sucesso!');
    }

    // Remove um material do banco de dados
    public function destroy($id)
    {
        // Encontra o material e remove
        $material = Material::findOrFail($id);
        $material->delete();

        // Redireciona de volta para a listagem com uma mensagem de sucesso
        return redirect()->route('materiais.index')->with('success', 'Material removido com sucesso!');
    }
}
