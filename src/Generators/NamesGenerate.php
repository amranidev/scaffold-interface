<?php

namespace Amranidev\ScaffoldInterface\Generators;

use URL;

/**
 * Class NamesGenerate
 *
 * @package scaffold-interface/Generators
 * @author Amrani Houssain <amranidev@gmail.com>
 */
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
    public function tableNames()
    {
        return str_plural(str_slug($this->data['TableName'], '_'));
    }

    /**
     * Table name parser for migration
     *
     */
    public function tableNameMigration()
    {
        return ucfirst($this->tableNames());
    }

    /**
     * Table name parser for classes
     *
     * @return String
     */
    public function tableName()
    {
        return ucfirst(str_singular(str_slug($this->data['TableName'], '_')));
    }

    /**
     * Table name parser single
     *
     * @return String
     */
    public function tableNameSingle()
    {
        return lcfirst($this->tableName());
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
        return "@foreach(\$" . $this->tableNames() . " as \$value)";
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
     * @ for blades
     *
     * @return char
     */
    public function blade()
    {
        return "@";
    }

    /**
     * Standard restapi for scaffold
     *
     * @return String
     */
    public function standardapi()
    {
        return URL::to($this->tableNameSingle());
    }

    /**
     * Get Template
     *
     * @return String
     */
    public function getTemplate()
    {
        return $this->data['template'];
    }

    public function getParse()
    {
        if (starts_with($this->data['template'], 'boot')) {
            return "Bt";
        } else {
            return "Mt";
        }

        throw new \Exception('Template Error');
    }

}
