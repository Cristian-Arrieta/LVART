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
Route::get('test', function()
{
    dd(Config::get('mail'));
});

Route::get('/','HomeController@index');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/read','ImageController@read')->name('read');
Route::get('/users/read','ImageController@read')->name('read');
Route::get('/images/read','ImageController@read')->name('read');

Route::get('filtro','HomeController@filtro')->name('filtro');

Route::post('ajaxRequest', 'UserController@ajaxRequest')->name('ajaxRequest');

Route::post('images/ajaxRequest', 'UserController@ajaxRequest')->name('ajaxRequest'); 
 
Route::post('users/ajaxRequest', 'UserController@ajaxRequest')->name('ajaxRequest');
 
Route::get('users/filtro','UserController@filtro')->name('users.filtro'); 
 
Route::get('users/{user}','UserController@show')->name('users.show');

Route::get('images/{image}/download', 'ImageController@download')->name('images.download');
			
Route::get('users','UserController@index')->name('users.index');

Route::get('images/ranking', 'ImageController@ranking')->name('images.ranking');

Route::middleware(['auth'])->group(function()
{
		
	Route::get('users/edit/{user}','UserController@edit')->name('users.edit');
					
	Route::put('users/{user}','UserController@update')->name('users.update');	
	
	Route::delete('users/{user}','UserController@destroy')->name('users.destroy');
	
	Route::get('followings','UserController@index_followings')->name('users.followings');
	
	Route::get('followers','UserController@index_followers')->name('users.followers');
	
	Route::get('followers/filtro','UserController@filtro_fol')->name('followers.filtro'); 
	
	Route::get('followings/filtro','UserController@filtro_following')->name('followings.filtro'); 
		
			
	Route::get('images/create','ImageController@create')->name('images.create');
	
	Route::get('images/edit/{image}','ImageController@edit')->name('images.edit');
	
	Route::post('images/store','ImageController@store')->name('images.store');
	
	Route::put('images/{image}','ImageController@update')->name('images.update');
	
	Route::post('images/like', 'ImageController@like')->name('images.like');
 
	Route::post('images/favorite', 'ImageController@favorite')->name('images.favorite');
		

	
	Route::delete('images/{image}','ImageController@destroy')->name('images.destroy');
	
	Route::get('images/favorites', 'ImageController@favorites')->name('images.favorites');
	
	Route::get('favorites/filtro','ImageController@favorites_filtro')->name('favorites.filtro'); 
	
	
	// --------------------------------------	Roles	------------------------------------------------
			
			
	Route::get('roles/index','RoleController@index')->name('roles.index')
		->middleware('permission:roles.index');
	
	Route::get('roles/create','RoleController@create')->name('roles.create')
		->middleware('permission:roles.create');
	
	Route::get('roles/filtro','RoleController@filtro')->name('roles.filtro')
		->middleware('permission:roles.index');
	
	Route::get('roles/{role}/edit','RoleController@edit')->name('roles.edit')
		->middleware('permission:roles.edit');							
	
	Route::get('roles/{role}','RoleController@show')->name('roles.show')
		->middleware('permission:roles.index');
			
	Route::post('roles/store','RoleController@store')->name('roles.store')
			->middleware('permission:roles.create');	
	
	
	
	Route::put('roles/{role}/update','RoleController@update')->name('roles.update')
			->middleware('permission:roles.edit');	
				
	Route::delete('roles/{role}','RoleController@destroy')->name('roles.destroy')
			->middleware('permission:roles.destroy');			
			
	
	// --------------------------------------	Comments	------------------------------------------------
			
	Route::post('images/comment','CommentController@store')->name('comments.store');
	Route::post('comments/edit/{comment}/','CommentController@edit')->name('comments.edit');
	Route::put('comments/{comment}/','CommentController@update')->name('comments.update');
	Route::delete('comments/{comment}','CommentController@destroy')->name('comments.destroy');
	
});

Route::get('images/{image}','ImageController@show')->name('images.show');





