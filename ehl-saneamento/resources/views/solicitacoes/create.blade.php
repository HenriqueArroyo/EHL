<!-- resources/views/solicitacoes/create.blade.php -->
@extends('layouts.app')

@section('title', 'Criar Solicitação')

@section('content')
<div class="container">
    <h1>Criar Solicitação de Material</h1>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('solicitacoes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id_funcionario">Funcionário</label>
            <select name="id_funcionario" id="id_funcionario" class="form-control">
                <option value="">Selecione um Funcionário</option>
                @foreach($funcionarios as $funcionario)
                    <option value="{{ $funcionario->id }}">{{ $funcionario->nome }}</option>
                @endforeach
            </select>
            @error('id_funcionario')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="id_material">Material</label>
            <select name="id_material" id="id_material" class="form-control">
                <option value="">Selecione um Material</option>
                @foreach($materiais as $material)
                    <option value="{{ $material->id }}">{{ $material->nome }}</option>
                @endforeach
            </select>
            @error('id_material')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="dataSolicitacao">Data da Solicitação</label>
            <input type="date" name="dataSolicitacao" id="dataSolicitacao" class="form-control" value="{{ old('dataSolicitacao') }}">
            @error('dataSolicitacao')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="quantidade">Quantidade</label>
            <input type="number" name="quantidade" id="quantidade" class="form-control" value="{{ old('quantidade') }}">
            @error('quantidade')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <input type="text" name="status" id="status" class="form-control" value="{{ old('status') }}">
            @error('status')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="dataDevolucao">Data de Devolução</label>
            <input type="date" name="dataDevolucao" id="dataDevolucao" class="form-control" value="{{ old('dataDevolucao') }}">
            @error('dataDevolucao')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Salvar Solicitação</button>
    </form>
</div>
@endsection
