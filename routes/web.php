<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/logout', 'Auth\LoginController@logout');

Route::group(['middleware' => 'admin'], function(){

	Route::get('/admin', 'AdminController@index')->name('admin.index');

	Route::resource('/admin/users', 'AdminUsersController', ['names' => [
		'index'		=>	'admin.users.index',
		'create'	=>	'admin.users.create',
		'store'		=>	'admin.users.store',
		'edit'		=>	'admin.users.edit',
	]] );

	Route::get('/post/{id}', ['as'=>'home.post', 'uses'=>'HomeController@post']);

	Route::resource('/admin/posts', 'AdminPostsController', ['names' => [
		'index'		=>	'admin.posts.index',
		'create'	=>	'admin.posts.create',
		'store'		=>	'admin.posts.store',
		'edit'		=>	'admin.posts.edit',
	]] );

	Route::resource('/admin/categories', 'AdminCategoriesController', ['names' => [
		'index'		=>	'admin.categories.index',
		'create'	=>	'admin.categories.create',
		'store'		=>	'admin.categories.store',
		'edit'		=>	'admin.categories.edit',
	]] );

	Route::resource('/admin/medias', 'AdminMediasController', ['names' => [
		'index'		=>	'admin.medias.index',
		'create'	=>	'admin.medias.create',
		'store'		=>	'admin.medias.store',
		'edit'		=>	'admin.medias.edit',
	]] );

	Route::delete('admin/delete/media', 'AdminMediasController@deleteMedia');

	Route::resource('/admin/comments', 'PostCommentsController', ['names' => [
		'index'		=>	'admin.comments.index',
		'create'	=>	'admin.comments.create',
		'store'		=>	'admin.comments.store',
		'edit'		=>	'admin.comments.edit',
		'show'		=>	'admin.comments.show',
	]] );

	Route::resource('/admin/comment/replies', 'CommentRepliesController', ['names' => [
		'index'		=>	'admin.comment.replies.index',
		'create'	=>	'admin.comment.replies.create',
		'store'		=>	'admin.comment.replies.store',
		'edit'		=>	'admin.comment.replies.edit',
		'show'		=>	'admin.comment.replies.show',		
	]] );

	Route::post('/comment/replies', 'CommentRepliesController@createReply');
	

});


Route::get('/home','HomeController@index');