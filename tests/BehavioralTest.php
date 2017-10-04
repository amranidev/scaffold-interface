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

    //Indenter
    public $indenter;

    //Paths
    public $path;

    //Generator
    public $generator;

    //SetUp
    public function setUp()
    {
        parent::setUp();

        // SetUp Request
        $this->request = app()->make('Request')->setRequest([
            'TableName' => 'Testable',
            'template'  => 'bootstrap',
            'opt0'      => 'A', 'attr0' => 'B', ]);

        $this->app->make('Scaffold');

        $this->datasystem = app()->make('Datasystem');

        $this->parser = app()->make('Parser');

        $this->path = app()->make('Path');

        $this->generator = app()->make('Generator');

        $this->indenter = app()->make('Indenter');
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
    public function testParser()
    {
        $this->assertEquals('testable', $this->parser->singular());
        $this->assertEquals('testables', $this->parser->plural());
        $this->assertEquals('Bt', $this->parser->getParse());
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
        $parser = $this->parser;
        $dataSystem = $this->datasystem;
        $this->assertEquals("<?php\n\n".view('scaffold-interface::template.model.model', compact('parser', 'dataSystem'))->render(), $this->generator->getModel()->generate());
    }

    //test Controller Generate
    public function testControllerGenerate()
    {
        $parser = $this->parser;
        $dataSystem = $this->datasystem;
        $this->assertEquals("<?php\n\n".view('scaffold-interface::template.controller.controller', compact('parser', 'dataSystem'))->render(), $this->generator->getController()->generate());
    }

    //test Migration Generate
    public function testMigrationGenerate()
    {
        $parser = $this->parser;
        $dataSystem = $this->datasystem;
        $this->assertEquals("<?php\n\n".view('scaffold-interface::template.migration.migration', compact('parser', 'dataSystem'))->render(), $this->generator->getMigration()->generate());
    }

    //test Route Generate
    public function testRouteGenerate()
    {
        $parser = $this->parser;
        $this->assertEquals("\n".view('scaffold-interface::template.routes', compact('parser'))->render(), $this->generator->getRoute()->generate());
    }

    // test views
    public function testViewsGenerate()
    {
        $parser = $this->parser;
        $dataSystem = $this->datasystem;
        //Test Index Generate
        $this->assertEquals($this->indenter
                ->indent(view('scaffold-interface::template.views.'.$parser->getTemplate().'.index', compact('parser', 'dataSystem'))->render()), $this->generator->getView()->generate()['index']);
        //Test Create Generate
        $this->assertEquals($this->indenter
                ->indent(view('scaffold-interface::template.views.'.$parser->getTemplate().'.create', compact('parser', 'dataSystem'))->render()), $this->generator->getView()->generate()['create']);
        //Test Edit Generate
        $this->assertEquals($this->indenter
                ->indent(view('scaffold-interface::template.views.'.$parser->getTemplate().'.edit', compact('parser', 'dataSystem'))->render()), $this->generator->getView()->generate()['edit']);
        //Test Show Generate
        $this->assertEquals($this->indenter
                ->indent(view('scaffold-interface::template.views.'.$parser->getTemplate().'.show', compact('parser', 'dataSystem'))->render()), $this->generator->getView()->generate()['show']);
    }
}
