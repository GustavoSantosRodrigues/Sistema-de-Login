<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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
    return view('auth.login');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // users
    Route::get('/users-index', [UserController::class, 'index'])->name('users.index');
    Route::get('/users-edit/{id}', [UserController::class, 'edit'])->name('users.edit'); 
    Route::put('/users-update/{id}', [UserController::class, 'update'])->name('users.update'); 

    //clients

    Route::resources([
        'cliente' => ClientController::class,
    ]);

    //meus_clientes
    Route::get('/meus_clientes/{id}', [ClientController::class, 'meus_clientes'])->name('meus.clientes');

    Route::get('/show/{client}', [ClientController::class, 'show'])->name('client.show');

    Route::get('/edit/{client}', [ClientController::class, 'edit'])->name('client.edit');
    Route::put('/update/{client}', [ClientController::class, 'update'])->name('client.update');
    

});

require __DIR__.'/auth.php';
