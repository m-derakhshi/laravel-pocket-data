<?php namespace mderakhshi\PocketData;


use Illuminate\Support\ServiceProvider;

class PocketDataServiceProvider extends ServiceProvider
{
	
	/**
	 * @var bool
	 */
	protected $defer = false;
	
	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot() {
		$this->loadRoutesFrom(__DIR__.'/routes.php');
	}
	
	/**
	 * @return void
	 */
	public function register() {
	}
	
	
}
