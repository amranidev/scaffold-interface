<?php

namespace Amranidev\ScaffoldInterface\Generators;

use Amranidev\ScaffoldInterface\Generators\NamesGenerate;

/**
 * Class RouteGenerate.
 *
 * @package scaffold-interface/Generators
 * @author Amrani Houssian <amranidev@gmailcom>
 */
class RouteGenerate
{
    /**
     * @var NamesGenerate
     */
    private $names;

    /**
     * Create new RouteGenerate instance.
     *
     * @param NamesGenerate
     */
    public function __construct(NamesGenerate $names)
    {
        $this->names = $names;
    }

    /**
     * Compile route template.
     *
     * @return String
     */
    public function generate()
    {
        return "\n" . view('scaffold-interface::template.routes', ['names' => $this->names])->render();
    }

}
