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

Route::get('/',function(){
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Auth::routes(['verify' => true]);
Route::get('admin/routes', 'HomeController@verify')->middleware('admin');

//dispatcher categorie.
Route::get('/dispatcher','DispatcherController@dispatcher');

//Proprietaire

Route::get('salle-sport-Proprietaire','proprietaire\ProprietaireController@index')->name('proprietaireIndex');

//utilisateur

Route::get('salle-sport-Location/utilisateur','utilisateur\UtilisateurController@index')->name('utilisateurIndex');



// contactez-nous

Route::get('contact', 'ContactController@create')->name('contact');
Route::post('contact', 'ContactController@store')->name('contact');

// salles

Route::resource('salle', 'salle\SalleController');
//route::get('mes-salles','salle\SalleController@index')->name('salleIndex');
//route::get('mes-salles','salle\SalleController@show')->name('salleShow');
//route::get('mes-salles','salle\SalleController@edit')->name('salleEdit');
//route::post('mes-salles','salle\SalleController@creat')->name('salleCreat');
//route::delete('mes-salles','salle\SalleController@destroy')->name('salleDestroy');