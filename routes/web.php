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

Auth::routes();

Route::get('/', function () {
    return view('layoutspage.app');
});



Route::get('/historia', function () {
    return view('historica.index');
});

Route::get('/mision', function () {
    return view('mision.index');
});

Route::get('/vision', function () {
    return view('vision.index');
});

Route::get('/armas', function () {
    return view('armas.index');
});


Route::resource('postulante', 'PostulanteController');
Route::get('downloadsHNWSBKEJS','ManagerController@download')->name('downloadsHNWSBKEJS');


Route::get('historia','ManagerController@historia')->name('historia');
Route::get('mision','ManagerController@mision')->name('mision');
Route::get('vision','ManagerController@vision')->name('vision');
Route::get('egreso','ManagerController@egreso')->name('egreso');
Route::get('ingreso','ManagerController@ingreso')->name('ingreso');
Route::get('armas_especialidades','ManagerController@armas_especialidades')->name('armas_especialidades');
Route::get('admision','ManagerController@admision')->name('admision');


Route::middleware(['auth'] )->group(function (){

    Route::get('/getPostulantes', 'PostulanteController@getPostulantes')->name('getPostulantes');
    Route::get('/getUsuarios', 'PostulanteController@getUsuarios')->name('getUsuarios');
    Route::resource('usuarios', 'UsuarioController');


    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('prospecto', 'ProspectoController');


    Route::get('/admin', function () {
        return view('index');
    });
});