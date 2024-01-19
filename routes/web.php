<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResourceController;

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





Route::group(['middleware' => ['auth', 'redirect404']], function () {
    Route::get('/create', [ResourceController::class, 'create'])->name('resources.create');
    Route::post('/store', [ResourceController::class, 'store'])->name('resources.store');
    Route::get('/user-resources', [ResourceController::class, 'getUserResources'])->name('user-resources');

    Route::put('/resources/{id}', [ResourceController::class, 'update'])->name('resources.update');
    Route::get('/resources/{id}/edit', [ResourceController::class, 'edit'])->name('resources.edit');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::delete('/resources/{id}', [ResourceController::class, 'destroy'])->name('resources.destroy');

    Route::get('/', [ResourceController::class, 'create'])->name('resources.create');
});

Route::group(['middleware' => ['guest', 'redirect404']], function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login');

    Route::get('/register', [AuthController::class, 'register_view'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});


Route::get('/{router}', [ResourceController::class, 'show'])->name('resources.show');
