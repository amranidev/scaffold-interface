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
        $this->publishes([__DIR__.'/../resources/assets' => public_path(),
        ], 'public');

        // Views
        $this->publishes([__DIR__.'/Publishes/Views' => base_path('/resources/views')], 'views');

        $this->publishes([__DIR__.'/Publishes/Controllers' => app_path('/Http/Controllers')], 'Controllers');

        // Load views.
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'scaffold-interface');

        // Migrations.
        $this->publishes([
            __DIR__.'/../database/migrations/' => database_path('migrations'),
        ], 'migrations');

        //config path.
        $configPath = __DIR__.'/../config/config.php';

        //Register config.
        $this->publishes([
            $configPath => config_path('amranidev/config.php'), ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('laravelRequest', \Illuminate\Http\Request::class);

        $this->app->singleton('Request', \Amranidev\ScaffoldInterface\Http\Request::class);

        $this->app->singleton('Scaffold', \Amranidev\ScaffoldInterface\Scaffold::class);

        $this->app->singleton('Datasystem', function ($app) {
            return new \Amranidev\ScaffoldInterface\Datasystem\Datasystem($app->make('Request')->getRequest());
        });

        $this->app->singleton('Parser', function ($app) {
            return new \Amranidev\ScaffoldInterface\Parsers\Parser($app->make('Request')->getRequest());
        });

        $this->app->singleton('Indenter', \Gajus\Dindent\Indenter::class);

        $this->app->singleton('Path', \Amranidev\ScaffoldInterface\Filesystem\Path::class);

        $this->app->singleton('Generator', \Amranidev\ScaffoldInterface\Generators\Generator::class);

        $this->app->singleton('ModelGenerate', \Amranidev\ScaffoldInterface\Generators\ModelGenerate::class);

        $this->app->singleton('ViewGenerate', \Amranidev\ScaffoldInterface\Generators\ViewGenerate::class);

        $this->app->singleton('MigrationGenerate', \Amranidev\ScaffoldInterface\Generators\MigrationGenerate::class);

        $this->app->singleton('ControllerGenerate', \Amranidev\ScaffoldInterface\Generators\ControllerGenerate::class);

        $this->app->singleton('RouteGenerate', \Amranidev\ScaffoldInterface\Generators\RouteGenerate::class);
    }
}
