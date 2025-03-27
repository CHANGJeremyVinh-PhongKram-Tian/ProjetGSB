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

Route::get('/modifierFrais/{id}', 'App\Http\Controllers\FraisController@updateFrais');
Route::post('/validateFrais', 'App\Http\Controllers\FraisController@validateFrais');

Route::get('/insertFrais', 'App\Http\Controllers\FraisController@addFrais');

Route::get('/removeFrais/{id}', 'App\Http\Controllers\FraisController@removeFrais');

Route::get('/ListerHorsforfait', 'App\Http\Controllers\FraishorsforfaitController@getFraisVisiteur');
