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

Route::get('/', function () {
    return view('home');
});
/*Route text*/
// Route::get('/artiste', function () {
//     return view('users.default.home');
// });

Route::get('/artiste', 'HomeController@indexArtiste')
    ->middleware('is_artiste')
    ->name('index.artiste');

Route::get('/admin', 'HomeController@indexAdmin')
    ->middleware('is_admin')
    ->name('index.admin');

/*end route text*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('auth/facebook', 'Auth\LoginController@redirectToFacebook');
Route::get('auth/facebook/callback', 'Auth\LoginController@handleFacebookCallback');
