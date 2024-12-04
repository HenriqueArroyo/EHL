<!-- resources/views/materiais/index.blade.php -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('assets/css/estoque.css')}}">

</head>
<body>
    <img id="background" src="{{asset('assets/img/Index.png')}}" alt="">
    <aside>
        <img id="logo" src="{{asset('assets/img/Logo.png')}}" alt="">
        <div class="buttons">
            <a id="dashboard" href="/gestor/dashboard"><button  type="submit"><p>Dashboard</p></button></a>
            <a id="estoque" href="/gestor/materiais"><button type="submit"><p>Estoque</p></button></a>
            <a id="solicitacoes" href="/gestor/solicitacao"><button type="submit"><p>Solicitações</p></button></a>
            <a id="sign-out" href="/home"><button type="submit"><p>Sign Out</p></button></a>
        </div>



    </aside>
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
                            <a href="{{ route('materiais.edit', $material->id) }}" id="editar">Editar</a>

                            <!-- Ação de Excluir -->
                            <form action="{{ route('materiais.destroy', $material->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" id="excluir" onclick="return confirm('Tem certeza que deseja excluir este material?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
<div class="new">  <a href="{{ route('materiais.create') }}" class="create"><button type="submit">Cadastrar Novo Material</button></a></div>

    </div>
</body>
</html>

