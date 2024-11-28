<?php


namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\Gestor;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function getUserId()
    {
        // Retorna o ID do usuário autenticado
        return Auth::id();
    }
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validar os dados recebidos
        $request->validate([
            'email' => 'required|email',
            'senha' => 'required|string',
        ]);

        // Primeiro, tenta autenticar como funcionário
        $funcionario = Funcionario::where('email', $request->email)->first();

        if ($funcionario && Hash::check($request->senha, $funcionario->senha)) {
            Auth::login($funcionario);
            return redirect()->route('funcionarios.index'); // Redireciona para a página do funcionário
        }

        // Se não for funcionário, tenta autenticar como gestor
        $gestor = Gestor::where('email', $request->email)->first();

        if ($gestor && Hash::check($request->senha, $gestor->senha)) {
            Auth::login($gestor);
            return redirect()->route('gestores.dashboard'); // Redireciona para o dashboard do gestor
        }

        // Se as credenciais não forem válidas, retorna com erro
        return back()->withErrors([
            'email' => 'Credenciais inválidas.',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
