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
		$paragraphs_number = 2;
		
		$users_number = 15;
		$name = "checked";
		$image = "checked";
		$address = "checked";
		$birthday = "checked";
		$blurb = "checked";
		
		$generator = new Badcow\LoremIpsum\Generator();
		$paragraphs = $generator->getParagraphs($paragraphs_number);
		
		return View::make('index')
		-> with ('paragraphs_number', 2)
		-> with('paragraphs', $paragraphs)
		-> with ('users_number', $users_number)
		-> with ('name', $name)
		-> with ('image', $image)
		-> with ('birthday', $birthday)
		-> with ('address', $address)
		-> with ('blurb', $blurb);
		
});


Route::get('/lorem', function()
{
		$paragraphs_number = Input::get('paragraphs_number');
		
		if ($paragraphs_number>0 AND $paragraphs_number<16) {
			
		$generator = new Badcow\LoremIpsum\Generator();
		$paragraphs = $generator->getParagraphs($paragraphs_number);

		return View::make('lorem')
		-> with ('paragraphs_number', $paragraphs_number)
		-> with('paragraphs', $paragraphs);
		
		} else {
		
		$paragraphs_number = 3;
		$generator = new Badcow\LoremIpsum\Generator();
		$paragraphs = $generator->getParagraphs($paragraphs_number);

		return View::make('lorem')
		-> with ('paragraphs_number', $paragraphs_number)
		-> with('paragraphs', $paragraphs);
		}
		
}) ->where ('paragraphs_number', '[0-9]+' );




Route::get('/users', function()
{
		$users_number = Input::get('users_number');
		$name = Input::get('name');
		$image = Input::get('image');
		$birthday = Input::get('birthday');
		$address = Input::get('address');
		$blurb = Input::get('blurb');
		
		
		if ($users_number>0 AND $users_number<101) {
		
		return View::make('users')
		-> with ('users_number', $users_number)
		-> with ('name', $name)
		-> with ('image', $image)
		-> with ('birthday', $birthday)
		-> with ('address', $address)
		-> with ('blurb', $blurb);
		
		
			} else {
			
		$users_number = 15;
		$name = "checked";
		$image = "checked";
		$address = "checked";
		$birthday = "checked";
		$blurb = "checked";
		
			}	
				
		return View::make('users')
		-> with ('users_number', $users_number)
		-> with ('name', $name)
		-> with ('image', $image)
		-> with ('birthday', $birthday)
		-> with ('address', $address)
		-> with ('blurb', $blurb);
	
})->where ('users_number', '[0-9]+' );;








