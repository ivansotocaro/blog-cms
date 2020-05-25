<?php

use Illuminate\Support\Facades\Route;
use  Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Resource_;

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

Route::redirect('/', 'blog');

Auth::routes();

//Web
Route::get('blog',               'Web\PageController@blog')->name('blog');

Route::get('detallepost/{slug}', 'Web\PageController@post')->name('detallepost');

Route::get('categoria/{slug}',   'Web\PageController@categoria')->name('categoria');

Route::get('etiqueta/{slug}',    'Web\PageController@etiqueta')->name('etiqueta');


Route::resource('comment', 'Web\CommentsController');



//Admin
Route::resource('tags',       'Admin\TagController');

Route::resource('categories', 'Admin\CategoryController');

Route::resource('posts',      'Admin\PostController');



