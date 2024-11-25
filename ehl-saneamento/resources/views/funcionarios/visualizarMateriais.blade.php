<!-- resources/views/materiais/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('assets/css/visualizarMateriais.css')}}">
</head>
<body>
    <img id="background" src="{{asset('assets/img/Index.png')}}" alt="">

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

