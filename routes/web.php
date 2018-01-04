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
//Languages
Route::post('/language', array(
    'as' => 'language',
    'Middleware' => 'LanguageSwitcher',
    'uses' => 'LanguageController@index',
));

//revalidate - prevent back history
Route::group(['middleware' => 'revalidate'],function(){
	
    Route::get('/', function () {
        return view('welcome');
    });

    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/user/logout', 'Auth\LoginController@userLogout')->name('user.logout');


    Route::prefix('admin')->group(function(){
        Route::get('/', 'AdminController@index')->name('admin.dashboard');
        Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
        Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
        Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
        Route::get('/profile', 'AdminController@show')->name('admin.profile');
        Route::get('/account', 'AdminController@account')->name('admin.account');
        Route::get('/qariah', 'AdminController@qariah')->name('admin.qariah');
        Route::get('/qariah/create', 'AdminController@create')->name('admin.qariah_create');
        Route::post('/', 'AdminController@store')->name('admin.store');
        Route::post('/changePassword','AdminController@changePassword')->name('changePassword');
    });

    Route::prefix('superadmin')->group(function(){
        Route::get('/', 'SuperAdminController@index')->name('superadmin.dashboard');
        Route::get('/login', 'Auth\SuperAdminLoginController@showLoginForm')->name('superadmin.login');
        Route::post('/login', 'Auth\SuperAdminLoginController@login')->name('superadmin.login.submit');
        Route::get('/logout', 'Auth\SuperAdminLoginController@logout')->name('superadmin.logout');
        Route::get('/account', 'SuperAdminController@account')->name('super.account');
        Route::get('/mosque', 'SuperAdminController@mosque')->name('super.mosque');  
        Route::get('/qariah', 'SuperAdminController@qariah')->name('super.qariah');
        Route::get('getMosque', 'SuperAdminController@getMosque')->name('getMosque');
        Route::get('getQariah', 'SuperAdminController@getQariah')->name('getQariah');
    });


});
//end revalidate


