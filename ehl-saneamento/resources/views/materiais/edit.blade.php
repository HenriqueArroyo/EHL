<!-- resources/views/materiais/edit.blade.php -->

@extends('layouts.app')

@section('title', 'Editar Material')

@section('content')
    <div class="container">
        <h1>Editar Material</h1>

        <!-- Exibição de mensagens de erro -->
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('materiais.update', $material->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome', $material->nome) }}" required>
            </div>

            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea name="descricao" id="descricao" class="form-control" required>{{ old('descricao', $material->descricao) }}</textarea>
            </div>

            <div class="form-group">
                <label for="quantidade">Quantidade</label>
                <input type="number" name="quantidade" id="quantidade" class="form-control" value="{{ old('quantidade', $material->quantidade) }}" required>
            </div>

            <div class="form-group">
                <label for="acesso">Acesso</label>
                <select name="acesso" id="acesso" class="form-control" required>
                    <option value="1" {{ old('acesso', $material->acesso) == 1 ? 'selected' : '' }}>Sim</option>
                    <option value="0" {{ old('acesso', $material->acesso) == 0 ? 'selected' : '' }}>Não</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </form>
    </div>
@endsection
