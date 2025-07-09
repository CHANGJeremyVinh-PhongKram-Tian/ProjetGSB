<?php

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

Route::get('/', function () {
    return view('home');
});
Route::get('/formLogin', 'App\Http\Controllers\VisiteurController@getLogin');

Route::post('/login', 'App\Http\Controllers\VisiteurController@signIn');

Route::get('/getLogin', 'App\Http\Controllers\VisiteurController@signOut');

Route::get('/Lister', 'App\Http\Controllers\PraticienController@getPraticiens');



Route::get('/ListerSpe/{id}', 'App\Http\Controllers\SpecialiteController@getPraticienSpe')->name('ListerSpe');
Route::get('/ListerAct/{id}', 'App\Http\Controllers\ActiviteController@getPraticienAct')->name('ListerAct');

Route::get('/modifierSpePraticien/{praticien}/{specialite}', 'App\Http\Controllers\PossederController@updateSpePraticien');
Route::post('/validateSpePraticien', 'App\Http\Controllers\PossederController@validateSpePraticien');

Route::get('/modifierActPraticien/{praticien}/{specialite}', 'App\Http\Controllers\InviterController@updateActPraticien');
Route::post('/validateActPraticien', 'App\Http\Controllers\InviterController@validateActPraticien');

Route::get('/insertSpePraticien', 'App\Http\Controllers\PossederController@addSpecialite');
Route::get('/insertActPraticien', 'App\Http\Controllers\InviterController@addActivite');

Route::get('/removeSpePraticien/{praticien}/{specialite}', 'App\Http\Controllers\PossederController@removeSpePraticien');
Route::get('/removeActPraticien/{praticien}/{activite}', 'App\Http\Controllers\InviterController@removeActPraticien');

Route::get('/Recherche', 'App\Http\Controllers\praticienController@recherche')->name('Recherche');
Route::post('/validateRecherche', 'App\Http\Controllers\PraticienController@validateRecherche')->name('ListerRecherche');
