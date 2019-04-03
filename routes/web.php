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
    return view('auth.login');
});

Route::get('home', 'HomeController@index')->name('home');
Route::get('welcome', 'TbCampanaPersonaTelefonoController@index')->name('welcome');
Auth::routes();
/**
 * sistema de referidos
 */
Route::resource('/referidos', 'TbcampanapersonaController');

Route::get('/dp', 'TbcampanapersonaController@createdp')->name('referidos.createdp');
Route::get('/cl', 'TbcampanapersonaController@createcl')->name('referidos.createcl');
Route::post('/dp/store', 'TbcampanapersonaController@storedp')->name('referidos.storedp');
Route::post('/cl/store', 'TbcampanapersonaController@storecl')->name('referidos.storecl');
Route::get('pre', 'PredictivoController@index')->name('pre.index');

/** fin del sistema de referidos */

/**
 * Sistema de actualizacion de parientes
 */


Route::resource('actualizars', 'ActualizarsController');
Route::get('api.contact', 'ActualizarsController@apiContact')->name('api.contact');

Route::resource('users', 'UserController');
Route::get('/actualizars/proce', 'ActualizarsController@edit')->name('gestion');
Route::get('/actualizars/proce/{id}/{agente}', 'ActualizarsController@procesarcedula')->name('gestion.procesar');

/**
 * sistema de inclumplidos
 */

Route::get('incumplidos', 'IncumplidosController@inicio')->name('incumplidos');

Route::get('incumplidos/incumplidos', 'IncumplidosController@index')->name('incumplido');

Route::post('incumplidos/exportar', 'IncumplidosController@export')->name('incumplido.exportar');
//Route::resource('incumplidos', 'IncumplidosController')->name('incumplido');

//0960403526

Route::get('recordatorioshoy', 'RecordatoriohoyController@index')->name('recordatorioshoy');
Route::post('recordatorioshoy/exportar', 'RecordatoriohoyController@export')->name('recordatorioshoy.exportar');



Route::get('recordatorio', 'RecordatorioController@index')->name('recordatorio');
Route::get('recordatorio/exportar', 'RecordatorioController@export')->name('recordatorio.exportar');

Route::get('recordatoriosemana', 'RecordatoriosemanaController@index')->name('recordatoriosemana');
Route::get('recordatoriosemana/exportar', 'RecordatoriosemanaController@export')->name('recordatoriosemana.exportar');



Route::get('pagoshoy/create', 'PagoshoyController@create')->name('pagoshoy.create');
Route::post('pagoshoy/store', 'PagoshoyController@export')->name('pagoshoy.store');
Route::get('pagoshoy', 'pagoshoyController@index')->name('pagoshoy');
Route::post('pagoshoy/exportar', 'pagoshoyController@export')->name('pagoshoy.exportar');


Route::get('contacto', 'DAMPLUScontactosWapController@create')->name('clientes');

Route::post('/contacto/store', 'DAMPLUScontactosWapController@store')->name('contacto.store');

Route::get('createagc', 'DAMPLUScontactosWapController@createagc')->name('agente');
Route::POST('/createagc/agc', 'DAMPLUScontactosWapController@agc')->name('contacto.agc');


//Route::resource('/createagc', 'DAMPLUScontactosWapController');
Route::get('createagc/{id}/edit/EE', 'DAMPLUScontactosWapController@edit')->name('createagc.edit');
Route::put('/createagc/{id}/update', 'DAMPLUScontactosWapController@update')->name('createagc.update');


/***
 * sistema de sac, actualizaciones de datos.
 */

Route::resource('sac', 'SacController');
Route::get('sac', 'SacController@index')->name('sac');

/***
 * sistema de terreno, subir archivo
 */


/**ARCHIVOS PARA TERRENO*/
Route::resource('archivos', 'ArchivosController');
Route::get('/archivos/show', 'ArchivosController@show')->name('cliente');
Route::get('/archivos', 'ArchivosController@index')->name('archivos');
Route::get('/archivos/de/{id}', 'ArchivosController@descargar')->name('archivos.descargas');

/**ARCHIVOS PUBLICOS*/

Route::post('archivospublic/store', 'ArchivospublicController@store')->name('archivospublic.store');

Route::get('createpublic', 'ArchivosController@createpublic')->name('archivos.createpublic');

Route::get('/archivospublic', 'ArchivospublicController@index')->name('archivospublic');
Route::get('/archivospublic/de/{id}', 'ArchivospublicController@descargar')->name('archivospublic.descargas');




/**CARTERA DE COBRANZA*/
Route::get('/clientes', 'ClienteController@index')->name('clientess');
Route::resource('/cliente', 'ClienteController');


/**SISTEMAS DEL IESS*/
Route::get('/data', function(){
    return view('dependent.data');
});
Route::get('/dependent', 'DependentController@index')->name('dependents');
Route::resource('/dependents', 'DependentController');

/**base del 192.168.1.7 bd_ultimo */
Route::get('/logpredictivo', 'LogpredictivoController@index')->name('logredictivos');
/**base de otros telefonos */
Route::get('/otrostelefonos', 'OtroscelularesController@index')->name('otroscelulares');


/**pago vero */

Route::resource('procesos', 'ProcesosController');
Route::get('/pagovero', 'IncumplidosController@pagovero')->name('pagovero');

/*Route::resource('DAMPLUScliente', 'DAMPLUSclienteController')->except([
    'index'
]);*/
Route::get('DAMPLUScliente', 'DAMPLUSclienteController@index')->name('DAMPLUScliente');
Route::get('/DAMPLUScliente/de/{id}', 'DAMPLUSclienteController@edit')->name('DAMPLUScliente.edit');
Route::put('/DAMPLUScliente/{id}/update', 'DAMPLUSclienteController@update')->name('DAMPLUScliente.update');


/**reportes cobranza */
Route::resource('/reporte','DAMPLUSreportesController');


/**ASIGNACION DE PUESTO PREDICTIVO*/
Route::resource('asignacionpuesto', 'A_DAMPLUSasignacionpuestoController');
Route::get('/asignacionpuesto/show', 'A_DAMPLUSasignacionpuestoController@show')->name('cliente');
Route::get('/asignacionpuesto', 'A_DAMPLUSasignacionpuestoController@index')->name('asignacionpuesto');
Route::get('/asignacionpuesto/de/{id}', 'A_DAMPLUSasignacionpuestoController@descargar')->name('asignacionpuesto.descargas');
