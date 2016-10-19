<?php

namespace Amranidev\ScaffoldInterface\Tests;

use Amranidev\ScaffoldInterface\Scaffold;

class ScaffoldTest extends TestCase
{
    public $request;

    public $scaffold;

    public function setUp()
    {
        parent::setUp();

        $this->request = app()->make('Request')->setRequest(['TableName' => 'Article',
                'template'                                               => 'bootstrap',
                'opt0'                                                   => 'String',
                'attr0'                                                  => 'title',
                'opt1'                                                   => 'LongText',
                'attr1'                                                  => 'body',
                'attr2'                                                  => 'String',
                'opt2'                                                   => 'author', ]);

        $this->scaffold = app()->make('Scaffold');

        $this->scaffold->migration()->model()->controller()->route()->views();
    }

    /**
     * test created files.
     */
    public function testScaffold()
    {
        $this->assertFileExists(base_path().'/resources/views/article/index.blade.php');
        $this->assertFileExists(base_path().'/resources/views/article/create.blade.php');
        $this->assertFileExists(base_path().'/resources/views/article/edit.blade.php');
        $this->assertFileExists(base_path().'/resources/views/article/show.blade.php');
        $this->assertFileExists(base_path().'/app/Article.php');
        $this->assertFileExists(base_path().'/app/ArticleController.php');
        $this->assertFileExists(base_path().'/app/routes.php');
    }
}
