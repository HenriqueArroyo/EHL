<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
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

// Rota para listar todos os materiais
Route::get('/visualizarMateriais', [MaterialController::class, 'viewFuncionario'])->name('funcionarios.visualizarMateriais');

// Rota para editar um material
Route::get('/materiais/{id}/edit', [MaterialController::class, 'edit'])->name('materiais.edit');

// Rota para atualizar os dados de um material
Route::put('/materiais/{id}', [MaterialController::class, 'update'])->name('materiais.update');

// Rota para excluir um material
Route::delete('/materiais/{id}', [MaterialController::class, 'destroy'])->name('materiais.destroy');

use App\Http\Controllers\SolicitacaoController;

Route::get('solicitacoes', [SolicitacaoController::class, 'index'])->name('solicitacoes.index');
Route::get('solicitarMateriais', [SolicitacaoController::class, 'create'])->name('solicitacoes.create');
Route::post('solicitacoes', [SolicitacaoController::class, 'store'])->name('solicitacoes.store');

use App\Http\Controllers\AuthController;

// Exibir o formulário de login
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');

// Processar o login
Route::post('login', [AuthController::class, 'login']);

// Logout
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

use App\Http\Middleware\StoreFuncionarioId;

Route::middleware([StoreFuncionarioId::class])->group(function () {
    Route::get('/funcionarios', [FuncionarioController::class, 'index']);
});


Route::middleware(['auth'])->group(function () {
    Route::get('/solicitacoesFuncionario', [SolicitacaoController::class, 'indexLogado'])->name('solicitacoes.funcionario');
});


Route::middleware(['auth'])->group(function () {
    // Exibe os materiais aprovados para devolução
    Route::get('materiaisAprovados', [SolicitacaoController::class, 'materiaisAprovados'])->name('solicitacoes.materiaisAprovados');

    // Rota para devolver material
    Route::put('solicitacoes/{id}/devolver', [SolicitacaoController::class, 'devolverMaterial'])->name('solicitacoes.devolver');
});
