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
    // doit etre remplcer par le return rediret::to('http://www.gesfit.be') -> wordpress de l'accueil
    return view('welcome');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Auth::routes(['verify' => true]);

//admin



Route::get('admin/index','AdminController@index')->name('adminIndex')->middleware('admin');
Route::get('admin/show','AdminController@show')->name('adminView')->middleware('admin');
Route::get('admin/destroy/{user}','AdminController@destroy')->name('adminDestroy')->middleware('admin');
//admin edit
Route::get('admin/modification/{user}','adminController@edit')->name('adminEdit')->middleware('admin');
route::put('admin/Mise-a-jour/donnees{user}','adminController@updateData')->name('adminUpdateData')->middleware('admin');
//admin categorie
Route::get('admin/categorie/index','CategorieController@index')->name('CategorieView')->middleware('admin');
Route::get('admin/categorie/destroy/{categorie}','CategorieController@destroy')->name('CategorieDestroy')->middleware('admin');
Route::get('admin/categorie/create','CategorieController@create')->name('CategorieCreate')->middleware('admin');
Route::post('admin/categorie/store','CategorieController@store')->name('CategorieStore')->middleware('admin');
//admin message contact
Route::get('admin/messageContact/index','MessageContactController@index')->name('messageAdminView')->middleware('admin');
Route::get('admin/messageContact/show/{message}','MessageContactController@show')->name('adminMessageView')->middleware('admin');
Route::get('admin/messageContact/destroy/{message}','MessageContactController@destroy')->name('adminMessageViewDestroy')->middleware('admin');
Route::get('admin/messageContact/create/{message}','MessageContactController@create')->name('adminMessageCreate')->middleware('admin');
Route::post('admin/messageContact/send/{message_contact}','MessageContactController@sendtoConfirmUser')->name('adminMessageSend')->middleware('admin');
//fin admin
//dispatcher categorie
Route::get('/dispatcher','DispatcherController@dispatcher')->name('dispatch');
//Proprietaire
Route::get('salle-sport-Proprietaire','proprietaire\ProprietaireController@index')->name('proprietaireIndex')->middleware('proprio');
//utilisateur
Route::get('salle-sport-Location/utilisateur','utilisateur\UtilisateurController@index')->name('utilisateurIndex')->middleware('utilisateur');
// contactez-nous
Route::get('contact', 'ContactController@create')->name('contact');
Route::post('contact', 'ContactController@store')->name('contact');
// Messagerie
Route::get('Mes-messages','messagerie\MessagerieController@index')->name('messagerieIndex');
Route::get('Mes-messages/{message}','messagerie\MessagerieController@read')->name('messagerieShow');
Route::delete('Mes-messages/{message}','messagerie\MessagerieController@destroy')->name('messagerieDelete');
Route::get('Mes-messages/repondre/{message}','messagerie\MessagerieController@create')->name('mesagerieCreate');
Route::post('Mes-messages/repondre/','messagerie\MessagerieController@send')->name('messagerieSend');
// Profil
Route::get('Mon-profil','ProfilController@index')->name('profilIndex');
Route::get('Mon-Profil/contactez-Nous','ProfilController@contact')->name('profilContact');
Route::get('Mon-Profil/reset','ProfilController@resetPassword')->name('profilRest');
Route::get('Mon-Profil/modification','ProfilController@edit')->name('profilEdit');
route::put('Mon-profil/Mise-a-jour/donnees','ProfilController@updateData')->name('profilUpdateData');
route::put('Mon-profil/Mise-a-jour/email','ProfilController@updateEmail')->name('profilUpdateEmail');

// salles
route::get('mes-salles','salle\SalleController@index')->name('salleIndex');
route::get('mes-salles/location/ajouter-une-salle-de-sport','salle\SalleController@create')->name('salleCreate');
route::get('mes-salles/{salle}/location/salle-sport/modification','salle\SalleController@edit')->name('salleEdit');
route::put('mes-salles/{salle}','salle\SalleController@update')->name('salleUpdate');
route::delete('mes-salles/{salle}','salle\SalleController@destroy')->name('salleDestroy');
route::post('mes-salles/','salle\SalleController@store')->name('salleStore');


// annonces


route::get('Mes-annonces/location-salle-de-sport/belgique','annonce\AnnonceController@index')->name('annonceIndex');
route::get('Mes-annonces/ajouter-une-annonce', 'annonce\AnnonceController@create')->name('annonceCreate');
route::post('Mes-annonces/ajouter-une-annonce', 'annonce\AnnonceController@store')->name('annonceStore');



