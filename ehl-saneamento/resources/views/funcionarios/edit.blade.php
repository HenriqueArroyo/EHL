<!-- resources/views/funcionarios/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Funcionário</h1>

    <form action="{{ route('funcionarios.update', $funcionario->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" value="{{ old('nome', $funcionario->nome) }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" value="{{ old('email', $funcionario->email) }}" required>
        </div>

        <div class="form-group">
            <label for="senha">Senha (deixe em branco para não alterar)</label>
            <input type="password" class="form-control" name="senha">
        </div>

        <div class="form-group">
            <label for="cpf">CPF</label>
            <input type="text" class="form-control" name="cpf" value="{{ old('cpf', $funcionario->cpf) }}" required>
        </div>

        <div class="form-group">
            <label for="dataNascimento">Data de Nascimento</label>
            <input type="date" class="form-control" name="dataNascimento" value="{{ old('dataNascimento', $funcionario->dataNascimento) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>
@endsection
