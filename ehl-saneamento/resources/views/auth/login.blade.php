<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
</head>
<body>
    <img id="background" src="{{asset('assets/img/Login.png')}}" alt="">

    <div class="container">
        <div class="left-panel">
            <!-- Você pode usar o fundo azul diretamente com CSS, sem necessidade de imagem -->
        </div>
        <div class="login-panel">
            <div class="logo">
                <h1>EHL<span>Saneamento</span></h1>
            </div>
            @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ url('login') }}" method="POST">
        @csrf

        <div class="input-group">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="input-group">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" class="form-control" id="senha" name="senha" required>
            @error('senha')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="login-button">Login</button>
    </form>
        </div>
    </div>
</body>
</html>
