<?php

use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/admin')->middleware('auth')->group(function () {

    Route::resource('products', ProductController::class);
    Route::resource('usuarios', UsuariosController::class);
    Route::resource('categorias', CategoriasController::class);
    // Route::resource('subcategorias', SubCategoriasController::class);

    // Subcategoria
    Route::get('categoria/{categoria}/subcategorias/', [SubCategoriasController::class, 'index'])->name('subcategorias.index');
    Route::get('categoria/{categoria}/subcategorias/create', [SubCategoriasController::class, 'create'])->name('subcategorias.create');
    Route::post('categoria/{categoria}/subcategorias/store', [SubCategoriasController::class, 'store'])->name('subcategorias.store');
    Route::delete('categoria/{categoria}/subcategorias/destroy/{subcategoria}', [SubCategoriasController::class, 'destroy'])->name('subcategorias.destroy');
    Route::get('categoria/{categoria}/subcategorias/edit/{subcategoria}', [SubCategoriasController::class, 'edit'])->name('subcategorias.edit');
    Route::put('categoria/{categoria}/subcategorias/update/{subcategoria}', [SubCategoriasController::class, 'update'])->name('subcategorias.update');
});





Route::get('/home', [HomeController::class, 'index'])->name('home');
