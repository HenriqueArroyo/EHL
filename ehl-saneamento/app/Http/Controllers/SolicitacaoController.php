<?php

namespace App\Http\Controllers;

use App\Models\Solicitacao;
use App\Models\Funcionario;
use App\Http\Controllers\FuncionarioController;
use App\Models\Material;
use Illuminate\Http\Request;

class SolicitacaoController extends Controller
{
    // Exibe o formulário para criar uma nova solicitação
    public function create()
    {
        $materiais = Material::all(); // Apenas materiais disponíveis
        return view('solicitacoes.create', compact('materiais'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_material' => 'required|exists:materiais,id',
            'quantidade' => 'required|integer|min:1',
        ]);

        $material = Material::findOrFail($request->id_material);

        // Lógica para definir status e ajustar estoque
        $status = $material->acesso ? 'Aprovado' : 'Requisitado'; // Mudança aqui: verifica se 'acesso' é true

        if ($status === 'Aprovado') {
            if ($material->quantidade < $request->quantidade) {
                return back()->withErrors(['quantidade' => 'Estoque insuficiente.']);
            }
            // Atualiza a quantidade do material no estoque
            $material->quantidade -= $request->quantidade;
            $material->save();
        }

        // Cria a solicitação com o status e a quantidade ajustada
        Solicitacao::create([
            'id_funcionario' => 1, // Obtém o ID do funcionário logado (ajustar conforme necessário)
            'id_material' => $material->id,
            'dataSolicitacao' => now(),
            'quantidade' => $request->quantidade,
            'status' => $status,
        ]);

        return redirect()->route('funcionarios.index')->with('success', 'Solicitação realizada com sucesso!');
    }



    // Lista todas as solicitações feitas
    public function index()
    {
        $solicitacoes = Solicitacao::all();
        return view('solicitacoes.index', compact('solicitacoes'));
    }
}
