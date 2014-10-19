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
	return "Index page";
});

Route::get('/lorem', function()
{
	return "Lorem Ipsum form";
});

Route::get('/lorem/{paragraphs_number}', function($paragraphs_number)
{
	return "Lorem Ipsum output. paragraphs_number equals to $paragraphs_number";
}) ->where ('paragraphs_number', '[0-9]+' );

Route::get('/users', function()
{
	return "Random users generation form";
});

Route::get('/users/{users_number}', function($users_number)
{
	return "Random users output. users_number equals to $users_number";
});
