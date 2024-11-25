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
        $status = $material->acesso === 'true' ? 'Aprovado' : 'Requisitado';

        if ($status === 'Aprovado') {
            if ($material->quantidade < $request->quantidade) {
                return back()->withErrors(['quantidade' => 'Estoque insuficiente.']);
            }
            $material->quantidade -= $request->quantidade;
            $material->save();
        }

        Solicitacao::create([
            'id_funcionario' => 1, // Obtém o ID do funcionário logado
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
