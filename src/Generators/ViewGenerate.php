<?php
namespace Amranidev\ScaffoldInterface\Generators;

use Amranidev\ScaffoldInterface\DataSystem\DataSystem;
use Amranidev\ScaffoldInterface\Generators\NamesGenerate;

class ViewGenerate
{
    /**
     * The DataSystem instance
     *
     * @var $dataSystem
     */
    public $dataSystem;

    /**
     * @var VeiwData
     */
    public $ViewData;

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
        $this->ViewData = $this->dataSystem->dataScaffold('v');
    }

    /**
     * fetch index view template
     *
     * @return String
     */
    public function GenerateIndex()
    {
        $standardApi = $this->names->standardapi();
        $foreach = $this->names->foreachh();
        $endforeach = $this->names->endforeachh();
        $open = $this->names->open();
        $close = $this->names->close();
        $TableName = $this->names->TableName();
        $TableNames = $this->names->TableNames();
        $TableNameSingle = $this->names->TableNameSingle();
        $request = $this->ViewData;
        $relationAttr = $this->dataSystem->relationAttr;
        return view('scaffold-interface::template.views.index', compact('request', 'TableName', 'TableNames', 'TableNameSingle', 'open', 'close', 'foreach', 'endforeach', 'standardApi', 'relationAttr'))->render();
    }

    /**
     * fetch create view template
     *
     * @return String
     */
    public function GenerateCreate()
    {
        $blade = '@';
        $open = $this->names->open();
        $close = $this->names->close();
        $standardApi = $this->names->standardapi();
        $TableName = $this->names->TableName();
        $request = $this->ViewData;
        $foreignKeys = $this->dataSystem->foreignKeys;
        return view('scaffold-interface::template.views.create', compact('request', 'TableName', 'standardApi', 'open', 'close', 'foreignKeys', 'blade'))->render();
    }

    /**
     * fetch show view template
     *
     * @return String
     */
    public function GenerateShow()
    {
        $blade = '@';
        $standardApi = $this->names->standardapi();
        $open = $this->names->open();
        $close = $this->names->close();
        $TableName = $this->names->TableName();
        $TableNameSingle = $this->names->TableNameSingle();
        $request = $this->ViewData;
        $relationAttr = $this->dataSystem->relationAttr;
        return view('scaffold-interface::template.views.show', compact('request', 'TableName', 'TableNameSingle', 'standardApi', 'open', 'close', 'relationAttr'))->render();
    }

    /**
     * fetch edit view template
     *
     * @return String
     */
    public function GenerateEdit()
    {
        $blade = '@';
        $open = $this->names->open();
        $close = $this->names->close();
        $standardApi = $this->names->standardapi();
        $TableName = $this->names->TableName();
        $TableNameSingle = $this->names->TableNameSingle();
        $request = $this->ViewData;
        $foreignKeys = $this->dataSystem->foreignKeys;
        return view('scaffold-interface::template.views.edit', compact('request', 'TableName', 'TableNameSingle', 'open', 'close', 'standardApi', 'open', 'close', 'foreignKeys', 'blade'))->render();
    }
}
