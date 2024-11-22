<!-- resources/views/funcionarios/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Funcionários</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>CPF</th>
                <th>Data de Nascimento</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($funcionarios as $funcionario)
                <tr>
                    <td>{{ $funcionario->nome }}</td>
                    <td>{{ $funcionario->email }}</td>
                    <td>{{ $funcionario->cpf }}</td>
                    <td>{{ $funcionario->dataNascimento }}</td>
                    <td>
                        <a href="{{ route('funcionarios.edit', $funcionario->id) }}" class="btn btn-warning">Editar</a>

                        <form action="{{ route('funcionarios.destroy', $funcionario->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja remover este funcionário?')">Remover</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
