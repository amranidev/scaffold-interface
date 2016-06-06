<?php

namespace Amranidev\ScaffoldInterface\Generators;

use Amranidev\ScaffoldInterface\Datasystem\Datasystem;

/**
 * Class ViewGenerate.
 *
 * @author Amrani Houssain <amranidev@gmail.com>
 */
class ViewGenerate
{
    /**
     * The DataSystem instance.
     *
     * @var
     */
    private $dataSystem;

    /**
     * @var NamesGenerate
     */
    private $names;

    /**
     * Create new ViewGenerate instance.
     *
     * @param $data Array
     * @param NamesGenerate
     */
    public function __construct(Datasystem $dataSystem, NamesGenerate $names)
    {
        $this->dataSystem = $dataSystem;
        $this->names = $names;
    }

    /**
     * Compile index view.
     *
     * @return string
     */
    public function generateIndex()
    {
        return view('scaffold-interface::template.views.'.$this->names->getTemplate().'.index', ['names' => $this->names, 'dataSystem' => $this->dataSystem])->render();
    }

    /**
     * Compile create view.
     *
     * @return string
     */
    public function generateCreate()
    {
        return view('scaffold-interface::template.views.'.$this->names->getTemplate().'.create', ['names' => $this->names, 'dataSystem' => $this->dataSystem])->render();
    }

    /**
     * Compile show view.
     *
     * @return string
     */
    public function generateShow()
    {
        return view('scaffold-interface::template.views.'.$this->names->getTemplate().'.show', ['names' => $this->names, 'dataSystem' => $this->dataSystem])->render();
    }

    /**
     * Compile edit view.
     *
     * @return string
     */
    public function generateEdit()
    {
        return view('scaffold-interface::template.views.'.$this->names->getTemplate().'.edit', ['names' => $this->names, 'dataSystem' => $this->dataSystem])->render();
    }
}
