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
    Route::get('/user/login', 'Auth\LoginController@showLoginForm')->name('user.login');
    Route::post('/user/login', 'Auth\LoginController@login')->name('user.login.submit');

    Route::prefix('admin')->group(function(){
        Route::get('/', 'AdminController@index')->name('admin.dashboard');
        Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
        Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
        Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
        Route::get('/profile', 'AdminController@show')->name('admin.profile');
        Route::get('/account', 'AdminController@account')->name('admin.account');
        Route::get('/qariah', 'AdminController@qariah')->name('admin.qariah');
        Route::get('/qariah/create', 'AdminController@create')->name('admin.qariah_create');
        Route::get('/qariah/upload', 'AdminController@upload')->name('admin.qariah_upload');
        Route::post('/qariah/upload/import', 'AdminController@import')->name('qariah.import');
        Route::get('/qariah/upload/export/{type}', 'AdminController@export')->name('qariah.export');
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
        Route::get('/qariah/create', 'SuperAdminController@create')->name('super.qariah_create');
        Route::post('/', 'SuperAdminController@store')->name('super.qariah_store');
        Route::get('/qariah/{ic}/{slug}/show', 'SuperAdminController@show')->name('super.qariah_show');
        Route::get('/qariah/{ic}/{slug}/edit', 'SuperAdminController@edit')->name('super.qariah_edit');
        Route::post('/qariah/update/{id}', 'SuperAdminController@update')->name('super.qariah_update');
        Route::post('/qariah/destroy/{id}', 'SuperAdminController@destroy')->name('super.qariah_destroy');
        Route::get('/mosque/create', 'SuperAdminController@mosque_create')->name('super.mosque_create');
        Route::post('/', 'SuperAdminController@mosque_store')->name('super.mosque_store');
        Route::get('/mosque/{id}/{slug}/show', 'SuperAdminController@mosque_show')->name('super.mosque_show');       
        Route::get('/mosque/{id}/{slug}/edit', 'SuperAdminController@mosque_edit')->name('super.mosque_edit');
        Route::post('/mosque/update/{id}', 'SuperAdminController@mosque_update')->name('super.mosque_update');
        Route::post('/mosque/delete/{id}', 'SuperAdminController@mosque_delete')->name('super.mosque_delete');
        Route::get('getMosque', 'SuperAdminController@getMosque')->name('getMosque');
        Route::get('getQariah', 'SuperAdminController@getQariah')->name('getQariah');
        Route::post('/changePassword','SuperAdminController@changePassword')->name('super.changePassword');
    });


});
//end revalidate


