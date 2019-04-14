<?php


Route::get('/','AlbumsController@index');
Route::get('/albums','AlbumsController@index');
Route::get('/albums/create','AlbumsController@create');
Route::post('/albums','AlbumsController@store');
Route::get('/albums/{album}','AlbumsController@show');


Route::get('/photos/create/{id}','PhotosController@create');
Route::post('/photos','PhotosController@store');
