<?php

namespace Amranidev\ScaffoldInterface;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

/**
 * Class ScaffoldInterfaceServiceProvider.
 *
 * @author Amrani Houssain <amranidev@gmail.com>
 */
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
        // Get namespace.
        $nameSpace = $this->app->getNamespace();

        // Set namespace alias for AppController.
        AliasLoader::getInstance()->alias('AppController', $nameSpace.'Http\Controllers\Controller');

        // Routes.
        $this->app->router->group(['namespace' => $nameSpace.'Http\Controllers'], function () {
            require __DIR__.'/Http/routes.php';
        });

        // Public
        $this->publishes([__DIR__.'/../public' => public_path(),
        ], 'public');

        // Load Views.
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'scaffold-interface');

        // Migrations.
        $this->publishes([
            __DIR__.'/../database/migrations/' => database_path('migrations'),
        ], 'migrations');

        //config path.
        $configPath = __DIR__.'/../config/config.php';

        //register config.
        $this->publishes([
            $configPath => config_path('amranidev/config.php'), ]);
    }

    public function register()
    {
    }
}
