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


Route::any('/success', 'MercadopagoController@success');
Route::any('/notificacionMP', 'MercadopagoController@notification');
Route::get('/logout', ['uses' => 'PanelAdministrativoController@logout', 'as' => 'logout']);

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [
        'localize',
        'localizationRedirect',
    ]
], function () {
    Route::get('/', ['as' => 'inicio.index', 'uses' => 'PagesController@index']);
    Route::resource(LaravelLocalization::transRoute('routes.variables'), 'VariablesController');
    Route::get(LaravelLocalization::transRoute('routes.reservacionCrear'),
        ['as' => 'crearReservacion', 'uses' => 'ReservacionController@create']);
    Route::post(LaravelLocalization::transRoute('routes.reservacionCrear'),
        ['as' => 'creandoReservacion', 'uses' => 'ReservacionController@store']);
    Route::get(LaravelLocalization::transRoute('routes.reservacionMostrar'),
        ['as' => 'mostrarReserva', 'uses' => 'ReservacionController@show']);
    Route::get('ObtenerVariables', 'VariablesController@fechasEspeciales');
    Route::get('ObtenerVariables/{fecha}', 'VariablesController@otrasVariables');
    Route::get('ObtenerDatosClientes/{identificacion}', 'ClientesController@obtenerDatos');
    Route::any('success', 'MercadopagoController@success');
    Route::get('tarifas',['as'=>'MostrarTarifas', 'uses'=>'PagesController@tarifas']);
});
Route::group(['prefix' => '/PanelAdministrativo'], function () {
    Route::get('/', ['uses' => 'PanelAdministrativoController@mostrarFormularioEntrada', 'as' => 'loginPanel']);
    Route::post('/', ['uses' => 'PanelAdministrativoController@validarAcceso', 'as' => 'loginAuth']);
    Route::resource('embarcaciones', 'EmbarcacionesAdminController');
    Route::resource('paseos', 'PaseosAdminController');
    Route::resource('fechasEspeciales', 'FechasEspecialesAdminController');
    Route::resource('precios', 'PreciosAdminController');
    Route::resource('variables', 'VariablesAdminController');
    Route::resource('tipoDePaseo', 'TipoDePaseoController');
    Route::get('reservas', ['uses' => 'ConsultarReservasAdminController@mostrarFormulario', 'as' => 'formularioDeConsultaDeReserva']);

    Route::get('reservas/consultar', ['uses' => 'ConsultarReservasAdminController@consultarReservas',
        'as' => 'consultarReservas']);
    Route::get('reservas/{idreserva}/editar', ['uses' => 'ConsultarReservasAdminController@editarReserva',
        'as' => 'editarReservas']);
    Route::any('reservas/{idreserva}/borrar', ['uses' => 'ConsultarReservasAdminController@borrarReserva',
        'as' => 'borrarReservas']);
    Route::post('reservas/modificarCliente', ['uses' => 'ConsultarReservasAdminController@modificarCliente',
        'as' => 'modificarCliente']);
    Route::post('reservas/modificarPaseo', ['uses' => 'ConsultarReservasAdminController@modificarPaseo',
        'as' => 'modificarPaseo']);
    Route::post('reservas/{idreserva}/pagar', ['uses' => 'ConsultarReservasAdminController@recibirPago',
        'as' => 'recibirPago2']);
    Route::post('reservas/pagar', ['uses' => 'ConsultarReservasAdminController@recibirPago',
        'as' => 'recibirPago']);
    Route::post('reservas/{idreserva}/borrarPago', ['uses' => 'ConsultarReservasAdminController@borrarPago',
        'as' => 'borrarPago']);
    Route::get('abordaje', ['uses' => 'ConsultarReservasAdminController@mostrarFormularioAbordaje',
        'as' => 'formularioDeConsultaDeAbordaje']);
    Route::post('reservas/anadirPasajeros', ['uses' => 'ConsultarReservasAdminController@anadirPasajeros',
        'as' => 'anadirPasajeros']);
    Route::post('reservas/borrarPasajero', ['uses' => 'ConsultarReservasAdminController@borrarPasajero',
        'as' => 'borrarPasajero']);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
