<!-- resources/views/materiais/index.blade.php -->

@extends('layouts.app')

@section('title', 'Listagem de Materiais')

@section('content')
    <div class="container">
        <h1>Listagem de Materiais</h1>

        <!-- Exibição de mensagem de sucesso -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tabela de materiais -->
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Quantidade</th>
                    <th>Acesso</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($materiais as $material)
                    <tr>
                        <td>{{ $material->id }}</td>
                        <td>{{ $material->nome }}</td>
                        <td>{{ $material->descricao }}</td>
                        <td>{{ $material->quantidade }}</td>
                        <td>{{ $material->acesso ? 'Sim' : 'Não' }}</td>
                        <td>
                            <!-- Ação de Editar -->
                            <a href="{{ route('materiais.edit', $material->id) }}" class="btn btn-info btn-sm">Editar</a>

                            <!-- Ação de Excluir -->
                            <form action="{{ route('materiais.destroy', $material->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este material?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('materiais.create') }}" class="btn btn-primary">Cadastrar Novo Material</a>
    </div>
@endsection
