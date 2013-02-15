<?php namespace Surfpup\Keywords;

use Illuminate\Support\ServiceProvider;

use Models\Keyword;
use Models\KeywordObject;
use Models\KeywordMap;
use Models\MoreKeywordExample;

class KeywordsServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('surfpup/keywords');
		//require __DIR__.'/Models/Keyword.php';
		//require __DIR__.'/Models/KeywordObject.php';
		//require __DIR__.'/Models/KeywordMap.php';
		//require __DIR__.'/Models/MoreKeywordExample.php';
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
