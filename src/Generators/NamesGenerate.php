<?php

namespace Amranidev\ScaffoldInterface\Generators;

use URL;

/**
 * Class NamesGenerate.
 *
 * @author Amrani Houssain <amranidev@gmail.com>
 */
class NamesGenerate
{
    /**
     * Reqeust view data.
     *
     * @var data
     */
    private $data;

    /**
     * Create new NamesGenerate instance.
     *
     * @param array $data
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Table name parser plurar.
     *
     * @return string
     */
    public function tableNames()
    {
        return str_plural(str_slug($this->data['TableName'], '_'));
    }

    /**
     * Table name parser for migration.
     *
     * @return string
     */
    public function tableNameMigration()
    {
        return ucfirst($this->tableNames());
    }

    /**
     * Table name parser for classes.
     *
     * @return string
     */
    public function tableName()
    {
        return ucfirst(str_singular(str_slug($this->data['TableName'], '_')));
    }

    /**
     * Table name parser single.
     *
     * @return string
     */
    public function tableNameSingle()
    {
        return lcfirst($this->tableName());
    }

    /**
     * Open age brackets for blades.
     *
     * @return string
     */
    public function open()
    {
        return '{{';
    }

    /**
     * Close age brackets for blades.
     *
     * @return string
     */
    public function close()
    {
        return '}}';
    }

    /**
     * Foreach string for blades.
     *
     * @return string
     */
    public function foreachh()
    {
        return '@foreach($'.$this->tableNames().' as $'.$this->tableName().')';
    }

    /**
     * Endforeach string for blades.
     *
     * @return string
     */
    public function endforeachh()
    {
        return '@endforeach';
    }

    /**
     * @ for blades.
     *
     * @return char
     */
    public function blade()
    {
        return '@';
    }

    /**
     * Standard restapi for scaffold.
     *
     * @return string
     */
    public function standardapi()
    {
        return URL::to($this->tableNameSingle());
    }

    /**
     * Get Template.
     *
     * @return string
     */
    public function getTemplate()
    {
        return $this->data['template'];
    }

    /**
     * Parse template specification.
     *
     * @throws Exception
     *
     * @return string
     */
    public function getParse()
    {
        if (starts_with($this->data['template'], 'boot')) {
            return 'Bt';
        } else {
            return 'Mt';
        }

        throw new \Exception('Template Error');
    }
}
