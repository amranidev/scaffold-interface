<?php
namespace Amranidev\ScaffoldInterface;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class ScaffoldInterfaceServiceProvider extends ServiceProvider
{

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

        // Get namespace
        $nameSpace = $this->app->getNamespace();

        // Set namespace alias for HomeController
        AliasLoader::getInstance()->alias('AppController', $nameSpace . 'Http\Controllers\Controller');

        // Routes
        $this->app->router->group(['namespace' => $nameSpace . 'Http\Controllers'], function () {
            require __DIR__ . '/Http/routes.php';
        });

        // Public
        $this->publishes([__DIR__ . '/../public' => public_path(),
        ], 'public');

        //Load Views
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'scaffold-interface');

        //migrations
        $this->publishes([
            __DIR__ . '/../database/migrations/' => database_path('migrations'),
        ], 'migrations');

    }
    public function register()
    {
    }
}
