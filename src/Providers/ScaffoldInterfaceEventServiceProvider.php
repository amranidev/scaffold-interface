<?php

namespace Amranidev\ScaffoldInterface\Providers;

use Amranidev\ScaffoldInterface\Models\Scaffoldinterface;
use Amranidev\ScaffoldInterface\Events\DeleteCrud;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class ScaffoldInterfaceEventServiceProvider extends ServiceProvider {
    
    /**
     * The event listener mappings.
     *
     * @var array
     */
    protected $listen = [
        'Amranidev\ScaffoldInterface\Events\DeleteCrud' => [
            'Amranidev\ScaffoldInterface\Listeners\DeleteCrudFiles',
        ],
    ];

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Scaffoldinterface::deleted(function($scaffold) {
            event(new DeleteCrud($scaffold));
        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

    }
}