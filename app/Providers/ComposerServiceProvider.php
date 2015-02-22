<?php namespace Impress\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use Impress\Http\Composers\ContentAttributesComposer;

class ComposerServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		View::composer('contents._attributes', ContentAttributesComposer::class);
	}

}