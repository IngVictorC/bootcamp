<?php

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
/*
Route::get('/', function () {
    return view('home');
});*/

Route::view('/home','home' )->name('home');

Route::resource('pelicula', App\Http\Controllers\PeliculaController::class);

Route::resource('actor', App\Http\Controllers\ActorController::class);

Route::resource('favorito', App\Http\Controllers\FavoritoController::class);

Route::post('/favorito/agregar', [App\Http\Controllers\FavoritoController::class, 'agregar'])->name('favorito.agregar');

//para el buscador
Route::get('search', [App\Http\Controllers\AutoCompleteController::class, 'index'])->name('search');
Route::get('autocomplete', [App\Http\Controllers\AutoCompleteController::class, 'autocomplete'])->name('autocomplete');