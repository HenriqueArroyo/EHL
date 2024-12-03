<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('assets/css/dashboard.css')}}">

</head>
<body>
    <img id="background" src="{{asset('assets/img/Index.png')}}" alt="">

<aside>
    <img id="logo" src="{{asset('assets/img/Logo.png')}}" alt="">
    <div class="buttons">
        <a id="dashboard" href="/gestor/dashboard"><button  type="submit"><p>Dashboard</p></button></a>
        <a id="estoque" href="/gestor/materiais"><button type="submit"><p>Estoque</p></button></a>
        <a id="solicitacoes" href=""><button type="submit"><p>Solicitações</p></button></a>
        <a id="sign-out" href="/home"><button type="submit"><p>Sign Out</p></button></a>
    </div>



</aside>

    <div class="container">
        <img id="solicitacaoGrafico" src="{{asset('assets/img/solicitacaoGrafico.png')}}" alt="">

    </div>

    <div class="voltar">
        <a href="funcionarios/index"><button type="submit">Voltar</button></a>
    </div>
</body>
</html>

