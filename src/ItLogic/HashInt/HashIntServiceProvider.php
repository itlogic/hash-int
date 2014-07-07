<?php namespace ItLogic\HashInt;

use Illuminate\Support\ServiceProvider;

class HashIntServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        $this->app['hashint'] = $this->app->share(function($app)
        {
            return new HashInt;
        });
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('hashint');
	}
    /*
     * test
     */

}

/**
 * test
 */
