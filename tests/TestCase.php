<?php

namespace Amranidev\ScaffoldInterface\Tests;

use Orchestra\Testbench\TestCase as OrchestraTestCase;

abstract class TestCase extends OrchestraTestCase
{
    protected function getPackageProviders($app)
    {
        return ['Amranidev\ScaffoldInterface\ScaffoldInterfaceServiceProvider'];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('amranidev.config.views', base_path().'/resources/views');
        $app['config']->set('amranidev.config.model', base_path().'/app');
        $app['config']->set('amranidev.config.controller', base_path().'/app');
        $app['config']->set('amranidev.config.migration', base_path().'/database/migrations');
        $app['config']->set('amranidev.config.routes', base_path().'/app/routes.php');
        $app['config']->set('amranidev.config.modelNameSpace', 'App');
        $app['config']->set('amranidev.config.migration', base_path().'/database/migrations');
        $app['config']->set('amranidev.config.controllerNameSpace', 'App\\Http\\Controllers');
    }
}
