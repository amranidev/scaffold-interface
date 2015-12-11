<?php
namespace Amranidev\ScaffoldInterface\Generators;

use Amranidev\ScaffoldInterface\Generators\NamesGenerate;

class RouteGenerate
{
    /**
     * @var NamesGenerate
     */
    public $names;

    /**
     * Create new RouteGenerate instance
     *
     * @param NamesGenerate
     */
    public function __construct(NamesGenerate $names)
    {
        $this->names = $names;
    }

    /**
     * fetch route template
     *
     * @return String
     */
    public function generate()
    {
        $TableName = $this->names->TableName();
        $TableNameSingle = $this->names->TableNameSingle();
        return "\n" . view('scaffold-interface::template.routes', compact('TableName', 'TableNameSingle'))->render();
    }

}
