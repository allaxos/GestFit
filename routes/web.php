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

route::get('mes-salles','salle\SalleController@index')->name('salleIndex');
route::get('mes-salles/location/ajouter-une-salle-de-sport','salle\SalleController@create')->name('salleCreate');
//route::get('mes-salles','salle\SalleController@edit')->name('salleEdit');
route::delete('mes-salles/{salle}','salle\SalleController@destroy')->name('salleDestroy');
route::post('mes-salles/','salle\SalleController@store')->name('salleStore');