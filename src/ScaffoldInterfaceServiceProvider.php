<?php
namespace Amranidev\ScaffoldInterface;
use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;
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
    public function boot() {
        
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

        //views
        $this->publishes([
            __DIR__.'/../views' => base_path('resources/views'),
            __DIR__.'/../views/layouts' => base_path('resources/views/layouts'),
        ]);

        //migrations
        $this->publishes([
        __DIR__.'/../database/migrations/' => database_path('migrations')
    ], 'migrations');
    
    }
    public function register() {
    }
}
