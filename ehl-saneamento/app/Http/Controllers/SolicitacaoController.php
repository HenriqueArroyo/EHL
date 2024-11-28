<?php

namespace App\Http\Controllers;

use App\Models\Solicitacao;
use App\Models\Funcionario;
use App\Http\Controllers\FuncionarioController;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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

    public function indexLogado()
    {
        // Pega o ID do funcionário logado
        $funcionarioId = 1;
        // Filtra as solicitações do funcionário logado
        $solicitacoes = Solicitacao::where('id_funcionario', $funcionarioId)->get();

        // Retorna a view passando as solicitações
        return view('solicitacoes.funcionario', compact('solicitacoes'));
    }

    public function materiaisAprovados()
    {
        $funcionarioId = 1;  // Pega o ID do funcionário logado
        // Filtra as solicitações aprovadas do funcionário logado
        $solicitacoes = Solicitacao::where('id_funcionario', $funcionarioId)
            ->where('status', 'Aprovado')  // Somente solicitações aprovadas
            ->get();

        return view('solicitacoes.materiaisAprovados', compact('solicitacoes'));
    }

    // Método para devolver material
    public function devolverMaterial($id)
    {
        // Pega a solicitação pelo ID
        $solicitacao = Solicitacao::findOrFail($id);

        // Verifica se o status da solicitação é "Aprovado"
        if ($solicitacao->status !== 'Aprovado') {
            return back()->withErrors(['status' => 'Somente materiais aprovados podem ser devolvidos.']);
        }

        // Atualiza o status da solicitação para "Devolvido"
        $solicitacao->status = 'Devolvido';
        $solicitacao->save();

        // Recupera o material e adiciona a quantidade de volta ao estoque
        $material = Material::findOrFail($solicitacao->id_material);
        $material->quantidade += $solicitacao->quantidade;
        $material->save();

        return redirect()->route('solicitacoes.materiaisAprovados')->with('success', 'Material devolvido com sucesso!');
    }
}
