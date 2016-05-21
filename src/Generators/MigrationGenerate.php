<?php

namespace Amranidev\ScaffoldInterface\Generators;

use Amranidev\ScaffoldInterface\DataSystem\DataSystem;

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
    public function __construct(DataSystem $dataSystem, NamesGenerate $names)
    {
        $this->dataSystem = $dataSystem;
        $this->names = $names;
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
