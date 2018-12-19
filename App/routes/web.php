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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function()
{
    Route::get('/home','HomeController@index')->name('home');
    Route::get('/profile','HomeController@edit')->name('profile.edit');
    Route::post('/profile/update/','HomeController@update')->name('profile.update');

    Route::resource('/childs','ChildController');

    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

    Route::get('/child/{id}/home','DataController@index')->name('child.dashboard');
    Route::get('/child/{id}/calls','DataController@getCalls')->name('child.calls');
    Route::get('/child/{id}/messages','DataController@getMessage')->name('child.messages');
    Route::get('/child/{id}/contacts','DataController@getContacts')->name('child.contacts');
    Route::get('/child/{id}/locations','DataController@getLocation')->name('child.locations');

});

