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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*RUTAS DE CONTRIBUYENTES */
Route::get('contribuyentes','ContribuyenteController@index');
Route::get('contribuyentes.listado','ContribuyenteController@indexListado');
Route::get('contribuyentes.filtro','ContribuyenteController@filtro');
Route::get('contribuyentes.filtroListado','ContribuyenteController@filtroListado');
Route::get('contribuyente.nuevo','ContribuyenteController@create');
Route::name('nuevoContribuyente')->post('contribuyente.nuevo','ContribuyenteController@insert');
Route::name('updateContribuyente')->post('contribuyentes','ContribuyenteController@update');
Route::get('editaContribuyente','ContribuyenteController@edita');
Route::get('tab', function () { return view('contribuyentes.customtab'); });