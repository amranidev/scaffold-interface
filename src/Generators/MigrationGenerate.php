<?php
namespace Amranidev\ScaffoldInterface\Generators;

use Amranidev\ScaffoldInterface\DataSystem\DataSystem;
use Amranidev\ScaffoldInterface\Generators\NamesGenerate;

class MigrationGenerate
{
    public $dataSystem;
    /**
     * @var dataMigration Array
     */
    public $dataMigration;

    /**
     * @var dataStandard
     */
    public $dataStandard;

    /**
     * @var NamesGenerate
     */
    public $names;

    /**
     * Create New MigrationGenerate instance
     *
     * @param $dataS Array
     * @param $dataM Array
     * @param NamesGenerate
     */
    public function __construct(DataSystem $dataSystem, NamesGenerate $names)
    {
        $this->dataSystem = $dataSystem;
        $this->dataMigration = $this->dataSystem->dataScaffold('migration');
        $this->dataStandard = $this->dataSystem->dataScaffold('v');
        $this->names = $names;
    }

    /**
     * fetch migration template
     *
     * @return String
     */
    public function generate()
    {
        $TableName = $this->names->TableNameMigration();
        $TableNames = $this->names->TableNames();
        $dataM = $this->dataMigration;
        $dataS = $this->dataStandard;
        $foreignKeys = $this->dataSystem->foreignKeys;
        return "<?php\n" . view('template.migration.migration', compact('TableName', 'dataM', 'dataS', 'TableNames', 'foreignKeys'))->render();
    }

}
