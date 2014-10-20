<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('index');
});



Route::get('/lorem', function()
{
	return View::make('lorem')
	-> with ('paragraphs_number', 3);
	
});




Route::get('/lorem/{paragraphs_number}', function($paragraphs_number)
{
	return View::make('lorem')-> with ('paragraphs_number', $paragraphs_number);
}) ->where ('paragraphs_number', '[0-9]+' );




Route::get('/users', function()
{
	return View::make('users')
	-> with ('users_number', 3);
	
});




Route::get('/users/{users_number}', function($users_number)
{
	return View::make('users')-> with ('users_number', $users_number);
}) ->where ('users_number', '[0-9]+' );



