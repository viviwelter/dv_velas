<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\LeituraDeboraVitoriaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('base.dashboard');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('usuario', UsuarioController::class);
    Route::post('usuario/search', [UsuarioController::class, 'search']);
    Route::resource('cliente', ClienteController::class);
    Route::post('cliente/search', [ClienteController::class, 'search']);
    Route::resource('fornecedor', FornecedorController::class);
    Route::post('fornecedor/search', [FornecedorController::class, 'search']);
    Route::resource('estoque', EstoqueController::class);
    Route::post('estoque/search', [EstoqueController::class, 'search']);
    Route::resource('leituradeboravitoria', LeituraDeboraVitoriaController::class);
    Route::post('leituradeboravitoria/search', [LeituraDeboraVitoriaController::class, 'search']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name(
        'profile.edit'
    );
    Route::patch('/profile', [ProfileController::class, 'update'])->name(
        'profile.update'
    );
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name(
        'profile.destroy'
    );
});

require __DIR__ . '/auth.php';
