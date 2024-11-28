<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('assets/css/visualizarPedidos.css')}}">

</head>
<body>
    <img id="background" src="{{asset('assets/img/Index.png')}}" alt="">

    <div class="container">
        <h1>Materiais Aprovados para Devolução</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif(session('errors'))
            <div class="alert alert-danger">
                {{ session('errors')->first() }}
            </div>
        @endif

        @if($solicitacoes->isEmpty())
            <p>Você não tem materiais aprovados para devolver.</p>
        @else
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
                                <form action="{{ route('solicitacoes.devolver', $solicitacao->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-danger">Devolver</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
    <div class="voltar">
        <a href="funcionarios/index"><button type="submit">Voltar</button></a>
    </div>
</body>
</html>

