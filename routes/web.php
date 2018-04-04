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

Auth::routes();

Route::view('/', 'welcome');
Route::redirect('/home', '/dashboard');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/page', function() {
	return view('page');
});

Route::resource('post', 'PostController');
Route::resource('user', 'UserController');
Route::resource('comment', 'CommentController');
Route::resource('article', 'ArticleController');
Route::resource('post.comment', 'PostCommentController');


// API routes
Route::post('/api/post/{post}/comment/{comment}/update', 'ApiPostCommentController@update');
Route::post('/api/article/{article}/update', 'ApiArticleController@update');
Route::post('/api/article/{article}/paragraph/store', 'ApiArticleParagraphController@store');
Route::post('/api/article/{article}/blockquote/store', 'ApiArticleBlockquoteController@store');
Route::get('/api/articleitem/{articleitem}/delete', 'ApiArticleitemController@destroy');
Route::post('/api/articleitem/{articleitem}/update', 'ApiArticleitemController@update');
Route::post('/api/paragraph/{paragraph}/update', 'ApiParagraphController@update');
Route::post('/api/blockquote/{blockquote}/update', 'ApiBlockquoteController@update');
