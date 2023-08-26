<?php

use App\Http\Controllers\CharacteristicController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DomeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PayMethodController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ServiceController;
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

Route::get('/registrar', function () {
    return view('welcome');
});
Route::resource('roles',RoleController::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/', HomeController::class)->name('home');

    Route::controller(CharacteristicController::class)->group(function () {
        Route::get('caracteristicas', 'index')->name('caracteristicas.index');
        Route::get('caracteristicas/create', 'create')->name('caracteristicas.create');
        Route::post('caracteristicas', 'store')->name('caracteristicas.store');
        Route::get('caracteristicas/{caracteristica}', 'show')->name('caracteristicas.show');
        Route::get('caracteristicas/{caracteristica}/edit', 'edit')->name('caracteristicas.edit');
        Route::put('caracteristicas/{caracteristica}', 'update')->name('caracteristicas.update');
        Route::delete('caracteristicas/{caracteristica}', 'destroy')->name('caracteristicas.destroy');
    });

    Route::resource('clientes', CustomerController::class);
    Route::resource('metodos', PayMethodController::class);
    Route::resource('servicios', ServiceController::class);
    Route::resource('domos', DomeController::class);
    Route::resource('planes', PlanController::class);
    Route::resource('usuarios', UserController::class);
    

});
