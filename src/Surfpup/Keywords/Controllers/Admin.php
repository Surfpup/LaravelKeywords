<?php namespace Surfpup\Keywords\Controllers;

use Illuminate\Routing\Controllers\Controller;
use Illuminate\Support\Facades\View;

class Admin extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Admin controller
	|--------------------------------------------------------------------------
	|
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function listKeywords()
	{
		return View::make('keywords::keywords');
	}

}