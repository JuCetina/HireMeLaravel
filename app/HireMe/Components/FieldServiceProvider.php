<?php namespace HireMe\Components;

use Illuminate\Support\ServiceProvider;

class FieldServiceProvider extends ServiceProvider
{
	public function register()
	{
		$this->app['field'] = $this->app->share(function($app)
		{
			$fieldBuilder = new FieldBuilder($app['form'], $app['session']);
			return $fieldBuilder;
		});
	}
}