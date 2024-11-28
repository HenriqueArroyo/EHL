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
        <h2>Minhas Solicitações</h2>

        @if($solicitacoes->isEmpty())
            <p>Você ainda não fez nenhuma solicitação.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Material</th>
                        <th>Quantidade</th>
                        <th>Status</th>
                        <th>Data da Solicitação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($solicitacoes as $solicitacao)
                        <tr>
                            <td>{{ $solicitacao->material->nome }}</td>
                            <td>{{ $solicitacao->quantidade }}</td>
                            <td>{{ $solicitacao->status }}</td>
                            <td>{{ $solicitacao->dataSolicitacao }}</td>
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

