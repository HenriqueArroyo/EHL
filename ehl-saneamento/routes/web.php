<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

use App\Http\Controllers\FuncionarioController;

Route::prefix('funcionarios')->group(function () {
    // Exibir o formulário de cadastro
    Route::get('create', [FuncionarioController::class, 'create'])->name('funcionarios.create');

    // Armazenar o funcionário
    Route::post('store', [FuncionarioController::class, 'store'])->name('funcionarios.store');

    Route::get('edit', [FuncionarioController::class, 'edit'])->name('funcionarios.edit');


    Route::get('index', [FuncionarioController::class, 'index'])->name('funcionarios.index');

    Route::resource('funcionarios', FuncionarioController::class);

});
use App\Http\Controllers\MaterialController;

// Rota para exibir o formulário de criação
Route::get('/materiais/create', [MaterialController::class, 'create'])->name('materiais.create');

// Rota para salvar os dados do material
Route::post('/materiais', [MaterialController::class, 'store'])->name('materiais.store');

// Rota para listar todos os materiais
Route::get('/materiais', [MaterialController::class, 'index'])->name('materiais.index');

// Rota para editar um material
Route::get('/materiais/{id}/edit', [MaterialController::class, 'edit'])->name('materiais.edit');

// Rota para atualizar os dados de um material
Route::put('/materiais/{id}', [MaterialController::class, 'update'])->name('materiais.update');

// Rota para excluir um material
Route::delete('/materiais/{id}', [MaterialController::class, 'destroy'])->name('materiais.destroy');

use App\Http\Controllers\SolicitacaoController;

Route::get('solicitacoes', [SolicitacaoController::class, 'index'])->name('solicitacoes.index');
Route::get('solicitacoes/create', [SolicitacaoController::class, 'create'])->name('solicitacoes.create');
Route::post('solicitacoes', [SolicitacaoController::class, 'store'])->name('solicitacoes.store');