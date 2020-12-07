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

// Route::get('/', function () {
//     return view('home');
// });
Route::get('/', 'ArtisteController@home');
/*Route text*/
Route::get('/admin1', function () {
    return view('admin1');
});
Route::get('/admin0', function () {
    return view('admin');
});
Route::get('/create-artiste', function () {
    return view('users.artistes.albums.create');
});

Route::get('/artiste', 'HomeController@indexArtiste')
    ->middleware('is_artiste')
    ->name('index.artiste');

Route::get('/show-artiste/{id}', 'ArtisteController@showArtiste')
    ->middleware('is_artiste')
    ->name('show.artiste');

Route::get('/admin', 'HomeController@indexAdmin')
    ->middleware('is_admin')
    ->name('index.admin');

/*end route text*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/getArtiste/{nb_page}', 'ArtisteController@getArtiste')->name('getArtiste');
// Route::get('auth/facebook', 'Auth\LoginController@redirectToFacebook');
// Route::get('auth/facebook/callback', 'Auth\LoginController@handleFacebookCallback');

// Route::get('/auth/redirect/{provider}', 'Auth\LoginController@redirect');
// Route::get('/callback/{provider}', 'Auth\LoginController@callback');

Route::get('/redirect', 'Auth\LoginController@redirect');
Route::get('/callback', 'Auth\LoginController@callback');
