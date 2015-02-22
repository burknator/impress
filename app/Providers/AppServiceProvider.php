<?php namespace Impress\Providers;

use Illuminate\Support\ServiceProvider;
use Impress\Model\ModelValidator;

class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register any application services.
	 *
	 * This service provider is a great spot to register your various container
	 * bindings with the application. As you can see, we are registering our
	 * "Registrar" implementation here. You can add your own bindings too!
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(
			'Illuminate\Contracts\Auth\Registrar',
			'Impress\Services\Registrar'
		);

		$this->app->bind('ModelValidator', function ()
		{
			return new ModelValidator(app('validator'));
		});
	}

}
