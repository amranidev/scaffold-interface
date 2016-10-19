<?php

namespace Amranidev\ScaffoldInterface\Tests;

class BehavioralTest extends TestCase
{
    //Request
    public $request;

    //Scaffold Object
    public $scaffold;

    //Datasystem
    public $datasystem;

    //NamesGenerate
    public $namesGenerate;

    //Paths
    public $path;

    //Generator
    public $generator;

    //SetUp
    public function __construct()
    {
        parent::setUp();

        // SetUp Request
        $this->request = app()->make('Request')->setRequest([
            'TableName' => 'Testable',
            'template'  => 'bootstrap',
            'opt0'      => 'A', 'attr0' => 'B', ]);

        $this->app->make('Scaffold');

        $this->datasystem = app()->make('Datasystem');

        $this->namesGenerate = app()->make('NamesGenerate');

        $this->path = app()->make('Path');

        $this->generator = app()->make('Generator');
    }

    //Test DataSystem
    public function testDataSystem()
    {
        $this->assertArrayHasKey('opt0', $this->datasystem->getData());
        $this->assertInternalType('array', $this->datasystem->dataScaffold('v'));
        $this->assertInternalType('array', $this->datasystem->getOnData());
        $this->assertInternalType('array', $this->datasystem->getForeignKeys());
    }

    //Test testNamesGenerate
    public function testNamesGenerate()
    {
        $this->assertEquals('testables', $this->namesGenerate->tableNames());
        $this->assertEquals('Testables', $this->namesGenerate->tableNameMigration());
        $this->assertEquals('Testable', $this->namesGenerate->tableName());
        $this->assertEquals('testable', $this->namesGenerate->tableNameSingle());
        $this->assertEquals('bootstrap', $this->namesGenerate->getTemplate());
        $this->assertEquals('Bt', $this->namesGenerate->getParse());
    }

    //Test Paths
    public function testPaths()
    {
        //Model Path
        $this->assertEquals(app_path('Testable.php'), $this->path->modelPath());
        /*Views*/
        //Views Directory
        $this->assertEquals(base_path().'/resources/views/testable', $this->path->dirPath());
        //Index
        $this->assertEquals(base_path().'/resources/views/testable/index.blade.php', $this->path->indexPath());
        //Create
        $this->assertEquals(base_path().'/resources/views/testable/create.blade.php', $this->path->createPath());
        //Edit
        $this->assertEquals(base_path().'/resources/views/testable/edit.blade.php', $this->path->editPath());
        //Show
        $this->assertEquals(base_path().'/resources/views/testable/show.blade.php', $this->path->showPath());
    }

    //Test Model Generate
    public function testModelGenerate()
    {
        $names = $this->namesGenerate;
        $dataSystem = $this->datasystem;
        $this->assertEquals("<?php\n\n".view('scaffold-interface::template.model.model', compact('names', 'dataSystem'))->render(), $this->generator->getModel()->generate());
    }

    //test Controller Generate
    public function testControllerGenerate()
    {
        $names = $this->namesGenerate;
        $dataSystem = $this->datasystem;
        $this->assertEquals("<?php\n\n".view('scaffold-interface::template.controller.controller', compact('names', 'dataSystem'))->render(), $this->generator->getController()->generate());
    }

    //test Migration Generate
    public function testMigrationGenerate()
    {
        $names = $this->namesGenerate;
        $dataSystem = $this->datasystem;
        $this->assertEquals("<?php\n\n".view('scaffold-interface::template.migration.migration', compact('names', 'dataSystem'))->render(), $this->generator->getMigration()->generate());
    }

    //test Route Generate
    public function testRouteGenerate()
    {
        $names = $this->namesGenerate;
        $this->assertEquals("\n".view('scaffold-interface::template.routes', compact('names'))->render(), $this->generator->getRoute()->generate());
    }

    public function testViewsGenerate()
    {
        $names = $this->namesGenerate;
        $dataSystem = $this->datasystem;
        //Test Index Generate
        $this->assertEquals(view('scaffold-interface::template.views.'.$names->getTemplate().'.index', compact('names', 'dataSystem'))->render(), $this->generator->getView()->generateIndex());
        //Test Create Generate
        $this->assertEquals(view('scaffold-interface::template.views.'.$names->getTemplate().'.create', compact('names', 'dataSystem'))->render(), $this->generator->getView()->generateCreate());
        //Test Edit Generate
        $this->assertEquals(view('scaffold-interface::template.views.'.$names->getTemplate().'.edit', compact('names', 'dataSystem'))->render(), $this->generator->getView()->generateEdit());
        //Test Show Generate
        $this->assertEquals(view('scaffold-interface::template.views.'.$names->getTemplate().'.show', compact('names', 'dataSystem'))->render(), $this->generator->getView()->generateShow());
    }
}
