<?php

namespace Amranidev\ScaffoldInterface\Generators;

/**
 * Class MigrationGenerate.
 *
 * @author Amrani Houssian <amranidev@gmail.com>
 */
class MigrationGenerate implements GeneratorInterface
{
    /**
     * The DataSystem instance.
     *
     * @var \Amranidev\ScaffoldInterface\Datasystem\Datasystem
     */
    private $dataSystem;

    /**
     * The Parser instance.
     *
     * @var \Amranidev\ScaffoldInterface\Parsers\Parser
     */
    private $parser;

    /**
     * Create New MigrationGenerate instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->dataSystem = app()->make('Datasystem');
        $this->parser = app()->make('Parser');
    }

    /**
     * Compile migration template.
     *
     * @return string
     */
    public function generate()
    {
        return "<?php\n\n".view('scaffold-interface::template.migration.migration', ['parser' => $this->parser, 'dataSystem' => $this->dataSystem])->render();
    }
}
