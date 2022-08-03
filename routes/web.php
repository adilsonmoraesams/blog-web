<?php

use App\Http\Controllers\AgenciaController;
use App\Http\Controllers\ContasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SubCategoriasController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

App::setLocale('pt_br');
Auth::routes();

Route::middleware('auth')->group(function () {

    Route::get('/', function () {
        return view('welcome');
    });


    Route::get('/dashboard', function () {
        return view('welcome');
    });

    Route::resource('usuarios', UsuariosController::class);

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // Route::resource('produto', ProdutoController::class);
    // Route::resource('categorias', CategoriasController::class);
    // Route::resource('subcategorias', SubCategoriasController::class);


    // Produtos
    Route::get('produtos', [ProdutoController::class, 'index'])->name('produto.index');
    Route::get('produtos/{produto}/show', [ProdutoController::class, 'show'])->name('produto.show');
    Route::get('produtos/create', [ProdutoController::class, 'create'])->name('produto.create');
    Route::post('produtos/store', [ProdutoController::class, 'store'])->name('produto.store');
    Route::get('produtos/{produto}/edit', [ProdutoController::class, 'edit'])->name('produto.edit');
    Route::put('produtos/{produto}', [ProdutoController::class, 'update'])->name('produto.update');
    Route::delete('produtos/{produto}', [ProdutoController::class, 'destroy'])->name('produto.destroy');


    // Fornecedor
    Route::get('fornecedores', [FornecedorController::class, 'index'])->name('fornecedor.index');
    Route::get('fornecedores/{fornecedor}/show', [FornecedorController::class, 'show'])->name('fornecedor.show');
    Route::get('fornecedores/create', [FornecedorController::class, 'create'])->name('fornecedor.create');
    Route::post('fornecedores/store', [FornecedorController::class, 'store'])->name('fornecedor.store');
    Route::get('fornecedores/{fornecedor}/edit', [FornecedorController::class, 'edit'])->name('fornecedor.edit');
    Route::put('fornecedores/{fornecedor}', [FornecedorController::class, 'update'])->name('fornecedor.update');
    Route::delete('fornecedores/{fornecedor}', [FornecedorController::class, 'destroy'])->name('fornecedor.destroy');


    // Agência
    Route::get('agencias', [AgenciaController::class, 'index'])->name('agencia.index');
    Route::get('agencias/{agencia}/show', [AgenciaController::class, 'show'])->name('agencia.show');
    Route::get('agencias/create', [AgenciaController::class, 'create'])->name('agencia.create');
    Route::post('agencias/store', [AgenciaController::class, 'store'])->name('agencia.store');
    Route::get('agencias/{agencia}/edit', [AgenciaController::class, 'edit'])->name('agencia.edit');
    Route::put('agencias/{agencia}', [AgenciaController::class, 'update'])->name('agencia.update');
    Route::delete('agencias/{agencia}', [AgenciaController::class, 'destroy'])->name('agencia.destroy');


    /**
     *  FINANCEIRO
    **/

    // Contas a Pagar/Receber
    Route::get('contas', [ContasController::class, 'index'])->name('contas.index');
    Route::get('contas/{contas}/show', [ContasController::class, 'show'])->name('contas.show');
    Route::get('contas/create', [ContasController::class, 'create'])->name('contas.create');
    Route::post('contas/store', [ContasController::class, 'store'])->name('contas.store');
    Route::get('contas/{contas}/edit', [ContasController::class, 'edit'])->name('contas.edit');
    Route::put('contas/{contas}', [ContasController::class, 'update'])->name('contas.update');
    Route::delete('contas/{contas}', [ContasController::class, 'destroy'])->name('contas.destroy');

});
