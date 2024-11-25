<?php


namespace App\Http\Controllers;

use App\Models\Funcionario;
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

        // Procurar pelo funcionário com o email fornecido
        $funcionario = Funcionario::where('email', $request->email)->first();

        // Verificar se o funcionário existe e se a senha está correta
        if ($funcionario && Hash::check($request->senha, $funcionario->senha)) {
            // Logar o usuário (opcional, dependendo do tipo de autenticação)
            Auth::login($funcionario);
            return redirect()->route('funcionarios.index');
        }

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
