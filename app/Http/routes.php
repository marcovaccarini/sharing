<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('contatti', 'PagesController@contatti');

Route::get('about', 'PagesController@about');
Route::get('metodo', 'PagesController@metodo');

Route::get('home', 'ServicesController@index');

Route::get('showthumb/{customer_id}', 'CustomersController@showthumb');

Route::delete('slidesdelete', 'CustomersController@destroyslides');

Route::delete('logodelete', 'CustomersController@destroylogo');


Route::resource('customers', 'CustomersController');


Route::resource('casehistories', 'CasehistoriesController', [
    'except' => 'show'
]);

Route::get('casehistories/{slug}', 'CasehistoriesController@show');


Route::get('services', 'ServicesController@index');
Route::get('services/{slug}', 'ServicesController@show');

Route::delete('picturedelete', 'CasehistoriesController@destroypicture');

Route::get('my-admin', ['middleware' => 'auth', 'uses' => 'PagesController@admin']);



Route::get('index_customers', ['middleware' => 'auth', 'uses' => 'CustomersController@admin']);

Route::post('index_customers', ['middleware' => 'auth', 'uses' => 'CustomersController@store']);


Route::get('index_casehistories', ['middleware' => 'auth', 'uses' => 'CasehistoriesController@admin']);

Route::post('index_casehistories', ['middleware' => 'auth', 'uses' => 'CasehistoriesController@store']);


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
