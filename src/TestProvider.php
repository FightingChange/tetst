<?php namespace Hexin\Gqy;

use Illuminate\Support\ServiceProvider;

class TestProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/views', 'test');

        $this->publishes([
            __DIR__.'/views' => base_path('resources/views/vendor/toastr'),
            __DIR__.'/config/test.php' => config_path('test.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app['test'] = $this->app->share(function ($app) {
            return new Test($app['session'], $app['config']);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['test'];
    }
}