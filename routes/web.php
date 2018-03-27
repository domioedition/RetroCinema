<?php

Route::get('/', 'MovieSessionController@index');
// Route::get('/movies/{id}', 'ScheduleMovieController@show');

// Route::get('/fillmovie', 'MovieController@fill');

// Route::get('/{film_id}/tickets/', 'TicketController@index');

Route::post('/posts', 'PostController@store');
Route::get('/posts', 'PostController@index');
Route::get('/posts/create', 'PostController@create');
Route::get('/posts/{post_id}', 'PostController@show');
