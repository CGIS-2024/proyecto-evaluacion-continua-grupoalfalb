<?php

use App\Http\Controllers\MenuController;
use App\Http\Controllers\DietistaController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\PlatoController;


use App\Http\Controllers\ProfileController;
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
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth'])->group(function () {
    Route::post('/pacientes/{paciente}/attach-menu', [PacienteController::class, 'attach_menu'])
        ->name('pacientes.attachMenu')
        ->middleware('can:attach_menu,paciente');
    Route::delete('/pacientes/{paciente}/detach-menu/{menu}', [PacienteController::class, 'detach_menu'])
        ->name('pacientes.detachMenu')
        ->middleware('can:detach_menu,paciente');


    Route::post('/menus/{menu}/attach-plato', [MenuController::class, 'attach_plato'])
        ->name('menus.attachPlato')
        ->middleware('can:attach_plato,menu');
    Route::delete('/menus/{menu}/detach-plato/{plato}', [MenuController::class, 'detach_plato'])
        ->name('menus.detachPlato')
        ->middleware('can:detach_plato,menu');




    Route::resources([
        'menus' => MenuController::class,
        'dietistas' => DietistaController::class,
        'pacientes' => PacienteController::class,
        'platos' => PlatoController::class,

    ]);

});


require __DIR__.'/auth.php';
