<?php

class MainTest extends TestCase
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
            'template' => 'bootstrap', 'opt0' => 'String',
            'attr0' => 'firstname', 'opt1' => 'Date', 'attr1' => 'birthday'];

        $this->scaffold = new Amranidev\ScaffoldInterface\Scaffold($this->request);
    }

    //Test Setup
    public function testScaffoldConstruct()
    {
        $this->assertInstanceOf('Amranidev\ScaffoldInterface\DataSystem\DataSystem', $this->scaffold->dataS);
        $this->assertInstanceOf('Amranidev\ScaffoldInterface\Generators\NamesGenerate', $this->scaffold->names);
        $this->assertInstanceOf('Amranidev\ScaffoldInterface\Filesystem\Paths', $this->scaffold->paths);
        $this->assertInstanceOf('Amranidev\ScaffoldInterface\Generators\Generator', $this->scaffold->generator);
        $this->assertInstanceOf('Amranidev\ScaffoldInterface\Scaffold', $this->scaffold);
    }

    //Test DataSystem
    public function testDataSystem()
    {

        $this->assertArrayHasKey('opt0', $this->scaffold->dataS->data);

        $this->assertInternalType('array', $this->scaffold->dataS->dataScaffold('v'));

        $this->assertInternalType('array', $this->scaffold->dataS->onData);

        $this->assertInternalType('array', $this->scaffold->dataS->foreignKeys);

    }
    //Test Names (Parse)
    public function testNamesGenerate()
    {
        $this->assertEquals('test_abrahams', $this->scaffold->names->TableNames());
        $this->assertEquals('Test_abrahams', $this->scaffold->names->TableNameMigration());
        $this->assertEquals('Test_abraham', $this->scaffold->names->TableName());
        $this->assertEquals('test_abraham', $this->scaffold->names->TableNameSingle());
        $this->assertEquals('bootstrap', $this->scaffold->names->getTemplate());
        $this->assertEquals('Bt', $this->scaffold->names->getParse());
    }

    //Test Paths
    public function testPaths()
    {
        //Model Path
        $this->assertEquals(app_path('Test_abraham.php'), $this->scaffold->paths->ModelPath());
        //Schema Path
        $this->assertEquals(app_path('Http/Controllers/Test_abrahamController.php'), $this->scaffold->paths->ControllerPath());

        /*Views*/
        //Views Directory
        $this->assertEquals(base_path() . "/resources/views/test_abraham", $this->scaffold->paths->DirPath());
        //Index
        $this->assertEquals(base_path() . "/resources/views/test_abraham/index.blade.php", $this->scaffold->paths->IndexPath());
        //Create
        $this->assertEquals(base_path() . "/resources/views/test_abraham/create.blade.php", $this->scaffold->paths->CreatePath());
        //Edit
        $this->assertEquals(base_path() . "/resources/views/test_abraham/edit.blade.php", $this->scaffold->paths->EditPath());
        //Show
        $this->assertEquals(base_path() . "/resources/views/test_abraham/show.blade.php", $this->scaffold->paths->ShowPath());

        //route
        $this->assertEquals(app_path("Http/routes.php"), $this->scaffold->paths->RoutePath());
    }

    //Test Model Generate
    public function testModelGenerate()
    {
        $names = $this->scaffold->names;

        $foreignKeys = $this->scaffold->dataS->foreignKeys;

        $this->assertEquals("<?php\n" . view('scaffold-interface::template.model.model', compact('names', 'foreignKeys'))->render(), $this->scaffold->generator->model->generate());
    }

    //test Controller Generate
    public function testControllerGenerate()
    {
        $names = $this->scaffold->names;

        $dataSystem = $this->scaffold->dataS;

        $this->assertEquals("<?php\n" . view('scaffold-interface::template.controller.controller', compact('names', 'dataSystem'))->render(), $this->scaffold->generator->controller->generate());
    }

    //test Migration Generate
    public function testMigrationGenerate()
    {
        $names = $this->scaffold->names;

        $dataSystem = $this->scaffold->dataS;

        $this->assertEquals("<?php\n" . view('scaffold-interface::template.migration.migration', compact('names', 'dataSystem'))->render(), $this->scaffold->generator->migration->generate());
    }

    //test Route Generate
    public function testRouteGenerate()
    {
        $names = $this->scaffold->names;

        $this->assertEquals("\n" . view('scaffold-interface::template.routes', compact('names'))->render(), $this->scaffold->generator->route->generate());
    }

    public function testViewsGenerate()
    {
        $names = $this->scaffold->names;

        $dataSystem = $this->scaffold->dataS;

        //Test Index Generate
        $this->assertEquals(view('scaffold-interface::template.views.' . $names->getTemplate() . '.index', compact('names', 'dataSystem'))->render(), $this->scaffold->generator->view->GenerateIndex());
        //Test Create Generate
        $this->assertEquals(view('scaffold-interface::template.views.' . $names->getTemplate() . '.create', compact('names', 'dataSystem'))->render(), $this->scaffold->generator->view->GenerateCreate());
        //Test Edit Generate
        $this->assertEquals(view('scaffold-interface::template.views.' . $names->getTemplate() . '.edit', compact('names', 'dataSystem'))->render(), $this->scaffold->generator->view->GenerateEdit());
        //Test Show Generate
        $this->assertEquals(view('scaffold-interface::template.views.' . $names->getTemplate() . '.show', compact('names', 'dataSystem'))->render(), $this->scaffold->generator->view->GenerateShow());
    }

}
