<?php

namespace App\Http\Controllers;

use App\Models\Solicitacao;
use App\Models\Funcionario;
use App\Models\Material;
use Illuminate\Http\Request;

class SolicitacaoController extends Controller
{
    // Exibe o formulário para criar uma nova solicitação
    public function create()
    {
        // Obtém todos os funcionários e materiais para preencher as opções no formulário
        $funcionarios = Funcionario::all();
        $materiais = Material::all();

        return view('solicitacoes.create', compact('funcionarios', 'materiais'));
    }

    // Armazena a solicitação no banco de dados
    public function store(Request $request)
    {
        // Validação dos dados recebidos
        $validated = $request->validate([
            'id_funcionario' => 'required|exists:funcionarios,id',
            'id_material' => 'required|exists:materiais,id',
            'dataSolicitacao' => 'required|date',
            'quantidade' => 'required|integer|min:1',
            'status' => 'required|string|max:20',
            'dataDevolucao' => 'nullable|date',
        ]);

        // Cria a solicitação no banco de dados
        Solicitacao::create($validated);

        // Redireciona para uma página de sucesso ou para a listagem de solicitações
        return redirect()->route('solicitacoes.index')->with('success', 'Solicitação realizada com sucesso!');
    }

    // Lista todas as solicitações feitas
    public function index()
    {
        $solicitacoes = Solicitacao::all();
        return view('solicitacoes.index', compact('solicitacoes'));
    }
}
