<?php
namespace Amranidev\ScaffoldInterface\Generators;

use Amranidev\ScaffoldInterface\Generators\NamesGenerate;

/**
 * Class RouteGenerate
 *
 * @package scaffold-interface/Generators
 * @author Amrani Houssian <amranidev@gmailcom>
 */
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
     * Compile route template
     *
     * @return String
     */
    public function generate()
    {

        $names = $this->names;

        return "\n" . view('scaffold-interface::template.routes', compact('names'))->render();

    }

}
