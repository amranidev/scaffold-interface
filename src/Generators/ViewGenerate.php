<?php
namespace Amranidev\ScaffoldInterface\Generators;

use Amranidev\ScaffoldInterface\Generators\NamesGenerate;

class ViewGenerate
{
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
    public function __construct($data, NamesGenerate $names)
    {
        $this->names = $names;
        $this->ViewData = $data;
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

        return view('template.views.index', compact('request', 'TableName', 'TableNames', 'TableNameSingle', 'open', 'close', 'foreach', 'endforeach', 'standardApi'))->render();
    }

    /**
     * fetch create view template
     *
     * @return String
     */
    public function GenerateCreate()
    {
        $open = $this->names->open();
        $close = $this->names->close();
        $standardApi = $this->names->standardapi();
        $TableName = $this->names->TableName();
        $request = $this->ViewData;
        return view('template.views.create', compact('request', 'TableName', 'standardApi', 'open', 'close'))->render();
    }

    /**
     * fetch show view template
     *
     * @return String
     */
    public function GenerateShow()
    {
        $standardApi = $this->names->standardapi();
        $open = $this->names->open();
        $close = $this->names->close();
        $TableName = $this->names->TableName();
        $TableNameSingle = $this->names->TableNameSingle();
        $request = $this->ViewData;

        return view('template.views.show', compact('request', 'TableName', 'TableNameSingle', 'standardApi', 'open', 'close'))->render();
    }

    /**
     * fetch edit view template
     *
     * @return String
     */
    public function GenerateEdit()
    {
        $open = $this->names->open();
        $close = $this->names->close();
        $standardApi = $this->names->standardapi();
        $TableName = $this->names->TableName();
        $TableNameSingle = $this->names->TableNameSingle();
        $request = $this->ViewData;

        return view('template.views.edit', compact('request', 'TableName', 'TableNameSingle', 'open', 'close', 'standardApi', 'open', 'close'))->render();
    }
}
