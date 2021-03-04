<?php

use App\User;
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
Route::patch('/update/users/{id}', 'UserController@update')
    ->name('update.users');
Route::get('/', 'HomeController@home')->name('home');
/*Route text*/
Route::get('/admin1', function () {
    return view('admin1');
});
Route::get('/admin0', function () {
    return view('admin');
});
Route::get('/adminusers', function () {
    return view('users1');
});
Route::get('/commande', function () {
    return view('commandes');
});
Route::get('/email', function () {
    return view('mails.confirmation');
});
/*END Route text*/

Route::get('/qui-sommes-nous', function () {
    return view('aPropos');
});

Route::get('/mentions-legales', function () {
    return view('politique');
});

Route::get('/conditions-generales-d-utilisation', function () {
    return view('conditions');
});

Route::get('/contacternous', function () {
    return view('contacte');
});

Route::get('/users/edit/{id}', 'UserController@edit')
    ->name('edit.users');
Route::get('/users/editByAdmin/{id}', 'UserController@editByAdmin')
    ->name('editByAdmin.users');
Route::get('/users_admin', 'UserController@indexAdmin')
    ->name('users.index');

Route::get('/users_artistes', 'UserController@indexArtiste')
    ->name('users.index_artistes');

Route::get('/users_default', 'UserController@indexDefault')
    ->name('users.index_default');

Route::delete('/users/{id}', 'UserController@destroy')
    ->name('destroy.users');
Route::patch('/usersByAdmin/{id}', 'UserController@updateByAdmin')
    ->name('updateByAdmin.users');

//Artiste

Route::get('/nosartistes', 'ArtisteController@showAllArtiste')->name('nosartistes');
Route::get('/artistes/commandes', 'ArtisteController@getCommande')->name('commandesArtiste');
Route::get('/commandes', 'DefaultController@index')->name('commandes');
Route::get('/liste_commandes', 'PurchaseController@index')->name('listeCommandes');
Route::put('/update/commande', 'PurchaseController@update')->name('updateCommande');
Route::get('/show/{id}', 'PurchaseController@show')->name('edit.purchase');
Route::get('/purchases/edit/{id}', 'PurchaseController@edit')->name('edit.ArtistePurchase');


Route::resource('artistes', 'ArtisteController');
Route::resource('services', 'ServiceController');
Route::resource('albums', 'AlbumController');
Route::resource('chansons', 'ChansonController');
Route::resource('medias', 'MediaController');


Route::get('paywithpaypal', array('as' => 'paywithpaypal','uses' => 'PayPalPaymentController@payWithPaypal',));
Route::post('paypal', array('as' => 'paypal','uses' => 'PayPalPaymentController@postPaymentWithpaypal',));
Route::get('paypal', array('as' => 'status','uses' => 'PayPalPaymentController@getPaymentStatus',));
/*end route text*/
Auth::routes(['verify' => true]);


Route::get('/home', 'HomeController@index')->middleware('auth')->name('dashboard');
Route::get('/getArtiste/{nb_page}', 'ArtisteController@getArtiste')->name('getArtiste');


Route::get('/redirect', 'Auth\LoginController@redirect');
Route::get('/callback', 'Auth\LoginController@callback');

