<?php

Route::get('/', 'RentController@index')->name('home');
Route::get('/rent/{id}', 'RentController@show');
Route::post('/rent/{id}/buy', 'RentController@buy')->name('buy');


Route::post('/posts', 'PostController@store');
Route::post('/posts/{post}/comments', 'CommentsController@store');
Route::get('/posts', 'PostController@index');
Route::get('/posts/create', 'PostController@create');
Route::get('/posts/{post_id}', 'PostController@show');


//show Ticket buying form
Route::post('/tickets', 'TicketController@store');
Route::get('/tickets/{rent_id}/create', 'TicketController@create');
Route::get('/tickets', 'TicketController@index')->name('tickets');


Route::post('/login', 'SessionsController@store');
Route::post('/register', 'RegistrationController@store');
Route::get('/register', 'RegistrationController@create');

Route::get('/login', 'SessionsController@create');
Route::get('/logout', 'SessionsController@destroy');


Route::get('/home', 'UserController@show');

/**
 * Movies
 */
Route::get('/movies', 'MovieController@index');
Route::get('/movies/{id}', 'MovieController@show');

/**
 *
 */
Route::get('/voting', 'VotingController@index')->name('voting');
Route::post('/voting', 'VotingController@store');