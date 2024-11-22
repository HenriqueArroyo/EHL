<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\Gestor;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    public function index()
    {
        $funcionarios = Funcionario::all();
        return view('funcionarios.index', compact('funcionarios'));
    }
    // Exibir o formulário de cadastro
    public function create()
    {
        // Obter os gestores para exibir no select
        $gestores = Gestor::all();

        return view('funcionarios.create', compact('gestores'));
    }

    public function edit($id)
    {
        $funcionario = Funcionario::findOrFail($id);
        return view('funcionarios.edit', compact('funcionario'));
    }

    // Armazenar um novo funcionário
    public function store(Request $request)
    {
        // Validar os dados do formulário
        $validated = $request->validate([
            'nome' => 'required|string|max:60',
            'email' => 'required|string|email|max:125|unique:funcionarios,email',
            'senha' => 'required|string|min:8',
            'cpf' => 'required|string|max:14|unique:funcionarios,cpf',
            'dataNascimento' => 'required|date',
            'id_gestor' => 'nullable|exists:gestores,id', // Validar se o gestor existe
        ]);



        // Criar o funcionário
        Funcionario::create($validated);

        // Redirecionar com sucesso
        return redirect()->route('funcionarios.index')->with('success', 'Funcionário cadastrado com sucesso!');
    }

    public function update(Request $request, $id)
    {
        $funcionario = Funcionario::findOrFail($id);
        $request->validate([
            'nome' => 'required|max:60',
            'email' => 'required|email',
            'senha' => 'nullable|min:6',
            'cpf' => 'required',
            'dataNascimento' => 'required|date',
        ]);

        $funcionario->update($request->all());

        return redirect()->route('funcionarios.index')->with('success', 'Funcionário atualizado com sucesso!');
    }


    public function destroy($id)
    {
        $funcionario = Funcionario::findOrFail($id);
        $funcionario->delete();

        return redirect()->route('funcionarios.index')->with('success', 'Funcionário removido com sucesso!');
    }
}
