<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/home', 'PagesController@index')->name('home');
Route::get('/', 'PagesController@index')->name('home');
Route::get('/about', 'PagesController@about');
Route::get('/contact', 'TicketController@create');
Route::post('/contact', 'TicketController@store');
Route::get('/tickets', 'TicketController@index');
Route::get('/tickets/{slug?}', 'TicketController@show');
Route::get('/tickets/{slug?}/edit', 'TicketController@edit');
Route::post('/tickets/{slug?}/edit','TicketController@update');
Route::post('/tickets/{slug?}/delete','TicketController@destroy');
Route::get('sendmail', function(){
    $details =[
        'title'=>'mail from laravel test',
        'body'=>'this is test from laravel framwwork'
    ];
    Mail::to('ludavid2398@gmail.com')->send(new \App\Mail\Gmail($details));
    echo "Your email has been sent successfully";
});
Route::post('/comment', 'CommentsController@newComment');
Auth::routes();
Route::group(array('prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'manager'), function () { 
    Route::get('users', 'UsersController@index'); 
});
Route::group(array('prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'manager'), function () { 
    Route::get('users', [ 'as' => 'admin.user.index', 'uses' => 'UsersController@index']); 
    Route::get('roles', 'RolesController@index'); 
    Route::get('roles/create', 'RolesController@create'); 
    Route::post('roles/create', 'RolesController@store'); 
    Route::get('users/{id?}/edit', 'UsersController@edit'); 
    Route::post('users/{id?}/edit','UsersController@update');
    Route::get('/', 'PagesController@home');
    Route::get('posts', 'PostsController@index'); 
    Route::get('posts/create', 'PostsController@create'); 
    Route::post('posts/create', 'PostsController@store'); 
    Route::get('posts/{id?}/edit', 'PostsController@edit'); 
    Route::post('posts/{id?}/edit','PostsController@update');
    Route::get('categories', 'CategoriesController@index'); 
    Route::get('categories/create', 'CategoriesController@create'); 
    Route::post('categories/create', 'CategoriesController@store');
});
Route::get('/blog', 'BlogController@index');
Route::get('/blog/{slug?}', 'BlogController@show');






