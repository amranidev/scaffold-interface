<?php

namespace Amranidev\ScaffoldInterface\Generators;

use Amranidev\ScaffoldInterface\DataSystem\DataSystem;
use Amranidev\ScaffoldInterface\Generators\NamesGenerate;

/**
 * Class ViewGenerate
 *
 * @package scaffold-interface/Generators
 * @author Amrani Houssain <amranidev@gmail.com>
 */
class ViewGenerate
{
    /**
     * The DataSystem instance
     *
     * @var $dataSystem
     */
    public $dataSystem;

    /**
     * @var NamesGenerate
     */
    public $names;

    /**
     * Create new ViewGenerate instance
     *
     * @param $data Array
     * @param NamesGenerate
     */
    public function __construct(DataSystem $dataSystem, NamesGenerate $names)
    {
        $this->dataSystem = $dataSystem;
        $this->names = $names;
    }

    /**
     * compile index view
     *
     * @return String
     */
    public function generateIndex()
    {

        $names = $this->names;
        $dataSystem = $this->dataSystem;

        return view('scaffold-interface::template.views.' . $this->names->getTemplate() . '.index', compact('names', 'dataSystem'))->render();
    }

    /**
     * compile create view
     *
     * @return String
     */
    public function generateCreate()
    {

        $names = $this->names;
        $dataSystem = $this->dataSystem;

        return view('scaffold-interface::template.views.' . $this->names->getTemplate() . '.create', compact('names', 'dataSystem'))->render();
    }

    /**
     * compile show view
     *
     * @return String
     */
    public function generateShow()
    {

        $names = $this->names;
        $dataSystem = $this->dataSystem;

        return view('scaffold-interface::template.views.' . $this->names->getTemplate() . '.show', compact('names', 'dataSystem'))->render();
    }

    /**
     * compile edit view
     *
     * @return String
     */
    public function generateEdit()
    {

        $names = $this->names;
        $dataSystem = $this->dataSystem;

        return view('scaffold-interface::template.views.' . $this->names->getTemplate() . '.edit', compact('names', 'dataSystem'))->render();
    }
}
