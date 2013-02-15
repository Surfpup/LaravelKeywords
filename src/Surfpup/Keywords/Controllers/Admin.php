<?php namespace Surfpup\Keywords\Controllers;

use Illuminate\Routing\Controllers\Controller;
use Illuminate\Support\Facades\View;

use Surfpup\Keywords\Models\Keyword;

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
		$keywords = Keyword::all();
		return View::make('keywords::keywords')
				->with('keywords', $keywords);
	}

}