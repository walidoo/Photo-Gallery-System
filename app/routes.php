<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
//Route::post('delete-additional-designer', array('as' =>'delete-additional-designer' , 'before' => 'auth', 'uses' => 'HomeController@deleteAdditionalDesigner' )); 
Route::get('/', 'UsersController@homeCreate');


Route::get('/users/delete-gallery-image/', 'UsersController@deleteUserImage');
Route::get('/users/edit-profile-value/', 'UsersController@editProfile');
// Route::get('/users/edit-profile/', 'UsersController@editProfile');
Route::get('/users/edit-active-value/', 'UsersController@changeActive');
/*Route::post('/users/dashboard/{id}', function($id)
{
	return $id;
});*/
Route::post('/users/dashboard', 'UsersController@createPhoto');
Route::get('/users/dashboard', 'UsersController@getDashboard');
Route::get('/users/profile', 'UsersController@profilePage');

Route::get('/users', 'UsersController@homeCreate');

Route::controller('/users', 'UsersController');
       







// Route::get('/signin', function()
// {
// 	return View::make('signin');
// });

// Route::get('/user', function()
// {
// 	return "hello user";
// });

// Route::get('/user', 'UserController@showProfile');
// Route::get('/welcome', 'UserController@welcome');
// Route::get('/wel/{id}', 'UserController@signup');
// Route::get('/dashboard', 'UserController@signin');
