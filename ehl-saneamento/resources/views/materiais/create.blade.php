<!-- resources/views/materiais/create.blade.php -->

@extends('layouts.app')

@section('title', 'Cadastrar Material')

@section('content')
    <div class="container">
        <h1>Cadastrar Material</h1>

        <!-- Exibição de mensagens de sucesso ou erro -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('materiais.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome') }}" required>
                @error('nome')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea name="descricao" id="descricao" class="form-control" required>{{ old('descricao') }}</textarea>
                @error('descricao')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="quantidade">Quantidade</label>
                <input type="number" name="quantidade" id="quantidade" class="form-control" value="{{ old('quantidade') }}" required>
                @error('quantidade')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="acesso">Acesso</label>
                <select name="acesso" id="acesso" class="form-control" required>
                    <option value="1" {{ old('acesso') == '1' ? 'selected' : '' }}>Sim</option>
                    <option value="0" {{ old('acesso') == '0' ? 'selected' : '' }}>Não</option>
                </select>
                @error('acesso')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
@endsection
