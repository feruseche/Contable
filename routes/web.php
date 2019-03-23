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

/*RUTAS DE EMPRESAS */
Route::get('empresas','empresaController@index');
Route::get('empresas.listado','empresaController@indexListado');
Route::get('empresas.filtro','empresaController@filtro');
Route::get('empresas.filtroListado','empresaController@filtroListado');
Route::get('empresa.nuevo','empresaController@create');
Route::name('nuevoEmpresa')->post('empresa.nuevo','empresaController@insert');
Route::name('updateEmpresa')->post('contribuyentes','empresaController@update');
Route::get('editaEmpresa','empresaController@edita');
Route::get('tab', function () { return view('empresas.customtab'); });

/*RUTAS DE TERCEROS */
Route::get('terceros','terceroController@index');
Route::get('terceros.listado','terceroController@indexListado');
Route::get('terceros.filtro','terceroController@filtro');
Route::get('terceros.filtroListado','terceroController@filtroListado');
Route::get('tercero.nuevo','terceroController@create');
Route::name('nuevoTercero')->post('tercero.nuevo','terceroController@insert');
Route::name('updateTercero')->post('terceros','terceroController@update');
Route::get('editaTercero','terceroController@edita');
Route::get('tab', function () { return view('terceros.customtab'); });

Route::view('compras','compras.index');

/*RUTAS PARA LA CARGA DE FACTURAS MANUALES DE VENTA*/

Route::name('buscaFacturaManual')->post('ventas.index','ventasController@buscaFacturaManual');
