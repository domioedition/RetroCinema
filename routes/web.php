<?php

Route::get('/', 'RentController@index');
Route::get('/rent/{id}', 'RentController@show');

 Route::get('/fillmovie', 'MovieController@fill');

// Route::get('/{film_id}/tickets/', 'TicketController@index');

Route::post('/posts', 'PostController@store');
Route::get('/posts', 'PostController@index');
Route::get('/posts/create', 'PostController@create');
Route::get('/posts/{post_id}', 'PostController@show');



//show Ticket buying form
Route::post('/tickets', 'TicketController@store');
Route::get('/tickets/{rent_id}/create', 'TicketController@create');
Route::get('/tickets', 'TicketController@index')->name('tickets');
