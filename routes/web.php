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
//Routes
Route::get('/', 'PagesController@home');
Route::get('/contact', 'TicketsController@create');
Route::get('/about', 'PagesController@about');
Route::post('/contact', 'TicketsController@store');
Route::get('/tickets','TicketsController@index');
Route::get('/tickets/{slug}','TicketsController@show');
Route::get('/tickets/{slug}/edit','TicketsController@edit');
Route::post('/tickets/{slug}/edit','TicketsController@update');
Route::post('/tickets/{slug}/delete','TicketsController@destroy');


Route::get('sendemail', function () {
    $data = array( 'name' => "Learning Laravel", );
    Mail::send('emails.welcome', $data, function ($message) {
        $message->from('antoniojankovic97@gmail.com', 'Learning Laravel');
        $message->to('toneex97@gmail.com')->subject('Learning Laravel test email');
    });
    return "Your email has been sent successfully";
});

Route::post('/comment','CommentsController@newComment');
Route::auth();

Route::get('/users/register','PagesController@register');
Route::get('/users/login','PagesController@login');

Route::group(array('prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'manager'), function () {
    Route::get('users', [ 'as' => 'admin.user.index', 'uses' => 'UsersController@index']);
    Route::get('roles', 'RolesController@index');
    Route::get('roles/create', 'RolesController@create');
    Route::post('roles/create', 'RolesController@store');
    Route::get('users/{id}/edit', 'UsersController@edit');
    Route::post('users/{id}/edit','UsersController@update');
    Route::get('/', 'PagesController@home');
    Route::get('posts', 'PostsController@index');
    Route::get('posts/create', 'PostsController@create');
    Route::post('posts/create', 'PostsController@store');
    Route::get('posts/{id?}/edit', 'PostsController@edit');
    Route::post('posts/{id?}/edit','PostsController@update');
    Route::get('categories', 'CategoriesController@index');
    Route::get('categories/create', 'CategoriesController@create');
    Route::post('categories/create', 'CategoriesController@store');
    Route::get('posts', 'PostsController@index');

    Route::get('posts/{id?}/edit', 'PostsController@edit');
    Route::post('posts/{id?}/edit','PostsController@update');


});

Route::get('/blog', 'BlogController@index');
Route::get('/blog/{slug?}', 'BlogController@show');

