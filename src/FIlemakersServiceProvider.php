<?php 
namespace Asdozzz\Filemakers;

use Illuminate\Support\ServiceProvider;

class FilemakersServiceProvider extends ServiceProvider
{

	public function register()
	{
		$this->mergeConfigFrom(__DIR__ . '/config/filemakers.php', 'filemakers');

		$this->app->singleton('filemakers', function ($app) {
			return new \Asdozzz\Filemakers\Filemakers();
		});
	}

	public function boot()
	{
		$this->loadTranslationsFrom(__DIR__.'/lang/filemakers.php','filemakers');

		$this->publishes([
			__DIR__.'/lang/filemakers.php' => storage_path('lang/vendor/filemakers'),
            __DIR__ . '/config/filemakers.php' => config_path('filemakers.php')
        ], 'config');
	}

}