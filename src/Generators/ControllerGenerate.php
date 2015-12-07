<?php
namespace Amranidev\ScaffoldInterface\Generators;

use Amranidev\ScaffoldInterface\DataSystem\DataSystem;
use Amranidev\ScaffoldInterface\Generators\NamesGenerate;

class ControllerGenerate
{
    public $dataSystem;
    /**
     * @var NamesGenerate
     */
    public $names;

    /**
     * @var dataStandard Array
     */
    public $dataS;

    /**
     * Create new ControllerGenerate instance
     *
     * @param $dataS Array
     * @param NamesGenerate
     */
    public function __construct(NamesGenerate $names, DataSystem $dataSystem)
    {
        $this->dataSystem = $dataSystem;
        $this->names = $names;
        $this->dataS = $this->dataSystem->dataScaffold('v');
    }

    /**
     * fetch controller tamplate
     *
     * @return String
     */
    public function generate()
    {
        $TableName = $this->names->TableName();
        $TableNameSingle = $this->names->TableNameSingle();
        $TableNames = $this->names->TableNames();
        $dataS = $this->dataS;
        $foreignKeys = $this->dataSystem->foreignKeys;
        $onData = $this->dataSystem->onData;
        return "<?php\n" . view('template.controller.controller', compact('TableName', 'TableNameSingle', 'TableNames', 'dataS', 'foreignKeys', 'onData'))->render();
    }

}
