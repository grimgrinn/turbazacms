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

Route::group(['namespace' => 'User'], function(){
    Route::get('/', 'HomeController@index')->name('user.home');
    Route::get('/turbaza/{slug}', 'TurbazaController@show')->name('user.turbaza.show');
    Route::get('/{slug}/about', 'TurbazaController@about')->name('user.turbaza.about');
    Route::get('/page/{id}', 'TurbazaController@page')->name('user.turbaza.page');
    Route::get('/contacts', 'HomeController@contacts')->name('user.turbaza.page');
    Route::get('/collabs', 'HomeController@collabs')->name('user.turbaza.page');
    Route::get('/info', 'HomeController@info')->name('user.turbaza.page');

});


Route::group(['namespace' => 'Admin'], function(){
    Route::resource('admin/turbaza', 'TurbazaController'   );
    Route::resource('admin/cottege', 'CottegeController'   );
    Route::resource('admin/page',    'PageController'      );
    Route::resource('admin/image',   'ImageController'     );
    Route::resource('admin/user',    'UserController'      );
    Route::get('admin/settings',     'SettingsController@index')->name('settings.index');
    Route::post('admin/settings/background',     'SettingsController@setBg');
    Route::post('admin/settings/contacts',     'SettingsController@setContacts');
    Route::post('admin/settings/collabs',     'SettingsController@setCollabs');
    Route::post('admin/settings/info',     'SettingsController@setInfo');
    Route::get('admin/home', 'HomeController@index')->name('admin.home');
    Route::get('admin/cottege/create/{turbaza}', 'CottegeController@create')->name('cottege.goodcreate');
    Route::get('admin/page/create/{turbaza}',    'PageController@create')->name('page.goodcreate');
    Route::get('admin-login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('admin-login', 'Auth\LoginController@login')->name('admin.login');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
