<?php
namespace Amranidev\ScaffoldInterface\Generators;

use Amranidev\ScaffoldInterface\Generators\NamesGenerate;

class MigrationGenerate
{
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
    public function __construct($dataS, $dataM, NamesGenerate $names)
    {
        $this->dataMigration = $dataM;
        $this->dataStandard = $dataS;
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
        return "<?php\n" . view('template.migration.migration', compact('TableName', 'dataM', 'dataS', 'TableNames'));
    }

}
