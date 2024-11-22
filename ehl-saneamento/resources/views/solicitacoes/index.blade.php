<!-- resources/views/solicitacoes/index.blade.php -->
@extends('layouts.app')

@section('title', 'Listagem de Solicitações')

@section('content')
<div class="container">
    <h1>Solicitações de Material</h1>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Funcionário</th>
                <th>Material</th>
                <th>Data Solicitação</th>
                <th>Quantidade</th>
                <th>Status</th>
                <th>Data Devolução</th>
            </tr>
        </thead>
        <tbody>
            @foreach($solicitacoes as $solicitacao)
            <tr>
                <td>{{ $solicitacao->id }}</td>
                <td>{{ $solicitacao->funcionario->nome }}</td>
                <td>{{ $solicitacao->material->nome }}</td>
                <td>{{ $solicitacao->dataSolicitacao }}</td>
                <td>{{ $solicitacao->quantidade }}</td>
                <td>{{ $solicitacao->status }}</td>
                <td>{{ $solicitacao->dataDevolucao ?? 'Não devolvido' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('solicitacoes.create') }}" class="btn btn-primary">Nova Solicitação</a>
</div>
@endsection
