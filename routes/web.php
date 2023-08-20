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

Route::get('/login', function () {
    return view('login');
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
Route::get('downloadsHNWSBKEJS','ProspectoController@download')->name('downloadsHNWSBKEJS');


Route::middleware(['auth'] )->group(function (){

    Route::get('/usuarios', 'HomeController@pageGet')->name('usuarios');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('prospecto', 'ProspectoController');


    Route::get('/admin', function () {
        return view('index');
    });

});