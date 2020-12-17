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
// Route::get('/commande', function () {
//     return view('users.default.commandes.index');
// });

Route::get('/nosartistes', function () {
    return view('showAllArtiste');
});
/*END Route text*/
// Route::get('/artiste', function () {
//     return view('users.default.home');
// });


Route::get('/users/edit/{id}', 'UserController@edit')
    ->name('edit.users');
Route::patch('/users/{id}', 'UserController@update')
    ->name('update.users');


Route::get('/commande', 'DefaultController@index')->name('commandes');
//Artiste

Route::get('/nosartistes', 'ArtisteController@showAllArtiste')->name('nosartistes');
// Route::get('/artistes/{id}', 'ArtisteController@show')->name('show.artiste');

Route::resource('artistes', 'ArtisteController');
Route::resource('services', 'ServiceController');
Route::resource('albums', 'AlbumController');
Route::resource('chansons', 'ChansonController');


Route::get('paywithpaypal', array('as' => 'paywithpaypal','uses' => 'PayPalPaymentController@payWithPaypal',));
Route::post('paypal', array('as' => 'paypal','uses' => 'PayPalPaymentController@postPaymentWithpaypal',));
Route::get('paypal', array('as' => 'status','uses' => 'PayPalPaymentController@getPaymentStatus',));
/*end route text*/
Auth::routes();


Route::get('/home', 'HomeController@index')->middleware('auth')->name('dashboard');
Route::get('/getArtiste/{nb_page}', 'ArtisteController@getArtiste')->name('getArtiste');


// Route::get('/redirect', 'Auth\LoginController@redirect');
// Route::get('/callback', 'Auth\LoginController@callback');
