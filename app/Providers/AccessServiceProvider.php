<?php namespace App\Providers;

use App\Services\Access\Access;
use Illuminate\Support\ServiceProvider;

/**
 * Class AccessServiceProvider
 * @package App\Providers
 */
class AccessServiceProvider extends ServiceProvider
{
	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Package boot method
	 */
	public function boot() {
		
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->registerAccess();
	}

	/**
	 * Register the application bindings.
	 *
	 * @return void
	 */
	private function registerAccess()
	{
		$this->app->bind('access', function($app) {
			return new Access($app);
		});
	}
}