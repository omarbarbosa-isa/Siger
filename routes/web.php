<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\Frontendcontroller;
use App\Http\Controllers\Frontend\UserController;

//landing page
Route::get('/', [Frontendcontroller::class, 'index'])->name('landing.page');

//dashboard
Route::middleware('auth')->group(function () {
Route::get('/dashboard', [Frontendcontroller::class, 'dashboard'])->name('dashboard.index');});

// Rotas da entidade cozinha
Route::get('/cozinha', [Frontendcontroller::class, 'cozinha'])->name('cozinha.index');
Route::get('/cozinha/create', [Frontendcontroller::class, 'createCozinha'])->name('cozinha.create');

// Rotas da entidade menu
Route::get('/menu', [Frontendcontroller::class, 'menu'])->name('menu.index');
Route::get('/menu/create', [Frontendcontroller::class, 'createMenu'])->name('menu.create');

// Rotas da entidade pos
Route::get('/pos', [Frontendcontroller::class, 'pos'])->name('pos.index');

// Rotas da entidade reservas
Route::get('/reservas', [Frontendcontroller::class, 'reservas'])->name('reservas.index');
Route::get('/reservas/create', [Frontendcontroller::class, 'createReservas'])->name('reservas.create');

// Rotas de views da entidade Users
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');

// Rotas lógicas da entidade Users
Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
Route::put('/users/{user}/update', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}/delete', [UserController::class, 'destroy'])->name('users.destroy');

/**  rotas temporarias de autenticação
Route::get('/login', [Frontendcontroller::class, 'entrada'])->name('auth.login');
Route::get('/register', [Frontendcontroller::class, 'inscricao'])->name('auth.register');
Route::get('/recover', [Frontendcontroller::class, 'recuperar'])->name('auth.recover');
Route::get('/success', [Frontendcontroller::class, 'viva'])->name('auth.success');
Route::get('/new-pass', [Frontendcontroller::class, 'Novo pass'])->name('auth.new-pass'); */

require __DIR__.'/auth.php';