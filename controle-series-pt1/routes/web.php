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
    return view('welcome');
});

Route::get('/series','SeriesController@index')
->name('listar_series');
Route::get('/series/create','SeriesController@create')
->name('form_criar_serie');
Route::post('/series/create','SeriesController@store');
// Route::post('/series/remover/{id}','SeriesController@destroy');
Route::delete('/series/{id}','SeriesController@destroy');

