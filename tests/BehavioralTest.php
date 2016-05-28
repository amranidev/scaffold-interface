<?php

namespace Amranidev\ScaffoldInterface\Tests;

use Amranidev\ScaffoldInterface\Scaffold;

class BehavioralTest extends TestCase
{
    //Request from GUI
    public $request;

    //Scaffold Object
    public $scaffold;

    //SetUp
    public function __construct()
    {
        parent::setUp();

        $this->request = ['TableName' => 'test abraham',
            'template'                => 'bootstrap', 'opt0' => 'String',
            'attr0'                   => 'firstname', 'opt1' => 'Date', 'attr1' => 'birthday', ];

        $this->scaffold = new Scaffold($this->request);
    }

    //Test Setup
    public function testScaffoldConstruct()
    {
        $this->assertInstanceOf('Amranidev\ScaffoldInterface\DataSystem\DataSystem', $this->scaffold->dataS);
        $this->assertInstanceOf('Amranidev\ScaffoldInterface\Generators\NamesGenerate', $this->scaffold->names);
        $this->assertInstanceOf('Amranidev\ScaffoldInterface\Filesystem\Path', $this->scaffold->paths);
        $this->assertInstanceOf('Amranidev\ScaffoldInterface\Generators\Generator', $this->scaffold->generator);
        $this->assertInstanceOf('Amranidev\ScaffoldInterface\Scaffold', $this->scaffold);
    }

    //Test DataSystem
    public function testDataSystem()
    {
        $this->assertArrayHasKey('opt0', $this->scaffold->dataS->getData());

        $this->assertInternalType('array', $this->scaffold->dataS->dataScaffold('v'));

        $this->assertInternalType('array', $this->scaffold->dataS->getOnData());

        $this->assertInternalType('array', $this->scaffold->dataS->getForeignKeys());
    }

    //Test Names (Parse)
    public function testNamesGenerate()
    {
        $this->assertEquals('test_abrahams', $this->scaffold->names->tableNames());
        $this->assertEquals('Test_abrahams', $this->scaffold->names->tableNameMigration());
        $this->assertEquals('Test_abraham', $this->scaffold->names->tableName());
        $this->assertEquals('test_abraham', $this->scaffold->names->tableNameSingle());
        $this->assertEquals('bootstrap', $this->scaffold->names->getTemplate());
        $this->assertEquals('Bt', $this->scaffold->names->getParse());
    }

    //Test Paths
    public function testPaths()
    {
        //Model Path
        $this->assertEquals(app_path('Test_abraham.php'), $this->scaffold->paths->modelPath());

        /*Views*/
        //Views Directory
        $this->assertEquals(base_path().'/resources/views/test_abraham', $this->scaffold->paths->dirPath());
        //Index
        $this->assertEquals(base_path().'/resources/views/test_abraham/index.blade.php', $this->scaffold->paths->indexPath());
        //Create
        $this->assertEquals(base_path().'/resources/views/test_abraham/create.blade.php', $this->scaffold->paths->createPath());
        //Edit
        $this->assertEquals(base_path().'/resources/views/test_abraham/edit.blade.php', $this->scaffold->paths->editPath());
        //Show
        $this->assertEquals(base_path().'/resources/views/test_abraham/show.blade.php', $this->scaffold->paths->showPath());
    }

    //Test Model Generate
    public function testModelGenerate()
    {
        $names = $this->scaffold->names;

        $foreignKeys = $this->scaffold->dataS->getForeignKeys();

        $this->assertEquals("<?php\n\n".view('scaffold-interface::template.model.model', compact('names', 'foreignKeys'))->render(), $this->scaffold->generator->getModel()->generate());
    }

    //test Controller Generate
    public function testControllerGenerate()
    {
        $names = $this->scaffold->names;

        $dataSystem = $this->scaffold->dataS;

        $this->assertEquals("<?php\n\n".view('scaffold-interface::template.controller.controller', compact('names', 'dataSystem'))->render(), $this->scaffold->generator->getController()->generate());
    }

    //test Migration Generate
    public function testMigrationGenerate()
    {
        $names = $this->scaffold->names;

        $dataSystem = $this->scaffold->dataS;

        $this->assertEquals("<?php\n\n".view('scaffold-interface::template.migration.migration', compact('names', 'dataSystem'))->render(), $this->scaffold->generator->getMigration()->generate());
    }

    //test Route Generate
    public function testRouteGenerate()
    {
        $names = $this->scaffold->names;

        $this->assertEquals("\n".view('scaffold-interface::template.routes', compact('names'))->render(), $this->scaffold->generator->getRoute()->generate());
    }

    public function testViewsGenerate()
    {
        $names = $this->scaffold->names;

        $dataSystem = $this->scaffold->dataS;

        //Test Index Generate
        $this->assertEquals(view('scaffold-interface::template.views.'.$names->getTemplate().'.index', compact('names', 'dataSystem'))->render(), $this->scaffold->generator->getView()->generateIndex());
        //Test Create Generate
        $this->assertEquals(view('scaffold-interface::template.views.'.$names->getTemplate().'.create', compact('names', 'dataSystem'))->render(), $this->scaffold->generator->getView()->generateCreate());
        //Test Edit Generate
        $this->assertEquals(view('scaffold-interface::template.views.'.$names->getTemplate().'.edit', compact('names', 'dataSystem'))->render(), $this->scaffold->generator->getView()->generateEdit());
        //Test Show Generate
        $this->assertEquals(view('scaffold-interface::template.views.'.$names->getTemplate().'.show', compact('names', 'dataSystem'))->render(), $this->scaffold->generator->getView()->generateShow());
    }
}
