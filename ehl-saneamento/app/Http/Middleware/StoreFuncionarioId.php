<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreFuncionarioId
{
    public function handle(Request $request, Closure $next)
    {
        // Verifica se há um usuário logado
        if (Auth::check()) {
            // Armazena o ID do usuário logado na sessão
            session(['funcionario_id' => Auth::id()]);
        }

        return $next($request);
    }
}
