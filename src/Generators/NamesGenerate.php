<?php
namespace Amranidev\ScaffoldInterface\Generators;

use URL;

class NamesGenerate
{
    /**
     * Reqeust view data
     *
     * @var data
     */
    public $data;

    /**
     * Create new Names instance
     *
     * @param Array $data
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Table name parser plurar
     *
     * @return String
     */
    public function TableNames()
    {
        return $this->data['TableName'];
    }

    /**
     * Table name parser for migration
     *
     */
    public function TableNameMigration()
    {
        return ucfirst($this->TableNames());
    }

    /**
     * Table name parser for classes
     *
     * @return String
     */
    public function TableName()
    {
        return substr($this->TableNameMigration(), 0, -1);
    }

    /**
     * Table name parser single
     *
     * @return String
     */
    public function TableNameSingle()
    {
        return substr($this->TableNames(), 0, -1);
    }

    /**
     * Open age brackets for blades
     *
     * @return String
     */
    public function open()
    {
        return '{{';
    }

    /**
     * Close age brackets for blades
     *
     * @return String
     */
    public function close()
    {
        return '}}';
    }

    /**
     * Foreach string for blades
     *
     * @return String
     */
    public function foreachh()
    {
        return "@foreach(\$" . $this->TableNames() . " as \$value)";
    }

    /**
     * Endforeach String for blades
     *
     * @return String
     */
    public function endforeachh()
    {
        return "@endforeach";
    }

    /**
     * Standard restapi for scaffold
     *
     * @return String
     */
    public function standardapi()
    {
        return URL::to($this->TableNameSingle());
    }

}
