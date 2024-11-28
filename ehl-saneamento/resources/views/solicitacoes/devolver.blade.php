@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Minhas Solicitações de Materiais</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif(session('errors'))
        <div class="alert alert-danger">
            {{ session('errors')->first() }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Material</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Status</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($solicitacoes as $solicitacao)
                <tr>
                    <td>{{ $solicitacao->material->nome }}</td>
                    <td>{{ $solicitacao->quantidade }}</td>
                    <td>{{ $solicitacao->status }}</td>
                    <td>
                        @if($solicitacao->status == 'Aprovado')
                            <form action="{{ route('solicitacoes.devolver', $solicitacao->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-danger">Devolver</button>
                            </form>
                        @else
                            <span class="text-muted">Não disponível para devolução</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
