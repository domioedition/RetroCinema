<?php

Route::get('/', 'FilmController@index');
Route::get('/films/{film}', 'FilmController@show');

Route::get('/{film_id}/tickets/', 'TicketController@index');
