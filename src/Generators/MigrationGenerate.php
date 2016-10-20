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
     * The DataSystem instance.
     *
     * @var \Amranidev\ScaffoldInterface\Datasystem\Datasystem
     */
    private $dataSystem;

    /**
     * The NamesGenerate instance.
     * 
     * @var \Amranidev\ScaffoldInterface\Generators\NamesGenerate
     */
    private $names;

    /**
     * Create New MigrationGenerate instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->dataSystem = app()->make('Datasystem');
        $this->names = app()->make('NamesGenerate');
    }

    /**
     * Compile migration template.
     *
     * @return string
     */
    public function generate()
    {
        return "<?php\n\n".view('scaffold-interface::template.migration.migration', ['names' => $this->names, 'dataSystem' => $this->dataSystem])->render();
    }
}
