<?php

namespace Amranidev\ScaffoldInterface\Generators;

/**
 * Class MigrationGenerate.
 *
 * @author Amrani Houssian <amranidev@gmail.com>
 */
class MigrationGenerate
{
    /**
     * DataSystem instance.
     *
     * @var
     */
    private $dataSystem;

    /**
     * NamesGenerate instance.
     *
     * @var NamesGenerate
     */
    private $names;

    /**
     * Create New MigrationGenerate instance.
     *
     * @param DataSystem
     * @param NamesGenerate
     */
    public function __construct()
    {
        $this->dataSystem = app()->make('Datasystem');
        $this->names = app()->make('NamesGenerate');
    }

    /**
     * fetch migration template.
     *
     * @return string
     */
    public function generate()
    {
        return "<?php\n\n".view('scaffold-interface::template.migration.migration', ['names' => $this->names, 'dataSystem' => $this->dataSystem])->render();
    }
}
