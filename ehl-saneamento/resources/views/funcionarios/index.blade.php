<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/css/index.css')}}">
    <title>H</title>
</head>
<body>
<div>
<img id="background" src="{{asset('assets/img/Index.png')}}" alt="">
<div class="voltar">
    <a href="/home"><button type="submit">logout</button></a>
</div>
<div class="container">
    <div class="button"><a href="/visualizarMateriais">Visualizar Materiais</a></div>
    <div class="button"><a href="/solicitarMateriais">Solicitar Materiais</a></div>
    <div class="button"><a href="/solicitacoesFuncionario">Visualizar Pedidos</a></div>
    <div class="button"><a href="/materiaisAprovados">Devolução de Materiais</a></div>
</div>

</body>
</html>
