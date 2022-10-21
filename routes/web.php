<?php

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

Route::get('/', function () {
    if (Auth::check()){
        return view('home');
    } else {
        return view('auth.login');
    }
})->name('home');

Auth::routes();

Route::get('/RegistrarEntrada', 'RegistrosController@entradas')->name('RegistrarEntrada');
Route::get('/RegistrarSalida', 'RegistrosController@salidas')->name('RegistrarSalida');
Route::get('/VerEntradas', 'RegistrosController@verEntradas')->name('VerEntradas');
Route::get('/VerSalidas', 'RegistrosController@verSalidas')->name('VerSalidas');
Route::post('/registrado', 'RegistrosController@guardarRegistro')->name('guardarEntrada');