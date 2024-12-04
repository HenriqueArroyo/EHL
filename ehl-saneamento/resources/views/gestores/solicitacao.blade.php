<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Solicitações</title>
    <link rel="stylesheet" href="{{ asset('assets/css/visualizarSolicitacoes.css') }}">
</head>
<body>
    <img id="background" src="{{ asset('assets/img/Index.png') }}" alt="">

    <aside>
        <img id="logo" src="{{ asset('assets/img/Logo.png') }}" alt="">
        <div class="buttons">
            <a id="dashboard" href="/gestor/dashboard"><button type="submit"><p>Dashboard</p></button></a>
            <a id="estoque" href="/gestor/materiais"><button type="submit"><p>Estoque</p></button></a>
            <a id="solicitacoes" href="/gestor/solicitacao"><button type="submit"><p>Solicitações</p></button></a>
            <a id="sign-out" href="/home"><button type="submit"><p>Sign Out</p></button></a>
        </div>
    </aside>

    <div class="container">

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
                    <th>Ações</th>  <!-- Nova coluna para o botão de aprovação -->
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
                    <td>
                        <!-- Botão para alterar o status para "Aprovado" -->
                        @if($solicitacao->status === 'Requisitado')
                            <form action="{{ route('gestores.solicitacao', $solicitacao->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button id="excluir" type="submit" class="btn btn-success">Aprovar</button>
                            </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="voltar">
        <a href="funcionarios/index"><button type="submit">Voltar</button></a>
    </div>
</body>
</html>
