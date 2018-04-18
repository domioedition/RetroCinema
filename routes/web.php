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

/*

1) seeds
2) movies fill move to command
3) move to action parameters finding objects by id
4) PHP DOCS
5) Validation move to Request object https://laravel.com/docs/5.6/validation#form-request-validation
6) move all models to separate folder (app/System/Models)
7) все joins заменить на relations (в select использоыать ->with('airport') там где надо)
8) all links build only WITH route() facade
9) Route::resource('surveys', 'SurveysController', ['only' => ['index', 'update', 'destroy']]);

*/