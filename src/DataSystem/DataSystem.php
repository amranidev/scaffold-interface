<?php

namespace Amranidev\ScaffoldInterface\DataSystem;

use Illuminate\Support\Facades\Schema;

/**
 * Class     DataSystem.
 *
 * @package  scaffold-interface\DataSystem
 * 
 * @author   Amrani Houssain <amranidev@gmail.com>
 *
 */
class DataSystem
{
    /**
     * Main interface reqeust.
     *
     * @var $data
     */
    private $data;

    /**
     * on data specification.
     *
     * @var $onData
     */
    private $onData;

    /**
     * ForrignKeys and relations.
     *
     * @var $foreignKeys
     */
    private $foreignKeys;

    /**
     * Relational Columns.
     *
     * @var $relationAttr
     */
    private $relationAttributes;

    /**
     * Create DataSystem instance.
     *
     * @param Array Data
     */
    public function __construct($data)
    {
        // unset TableName
        unset($data['TableName']);
        
        // unset template
        unset($data['template']);
        
        $this->data = $data;

        $this->tables($this->data);

        $this->getAttr();
    }

    /**
     * Analyse data and attributes.
     *
     * @param Array $data
     */
    private function getAttr()
    {
        foreach ($this->foreignKeys as $key => $value) {
            $Schema = Schema::getColumnListing($value);
            unset($Schema[0]);
            foreach ($Schema as $SchemaKey => $SchemaValue) {
                if (strpos($SchemaValue, '_id')) {
                    unset($Schema[$SchemaKey]);
                }
            }
            $this->relationAttributes[$value] = $Schema;
        }
    }

    /**
     * Analyse data and get ondata specification.
     *
     * @param Array $data
     */
    private function tables($data)
    {
        $onData = [];
        $foreignKeys = [];
        $tmp = '';
        $i = 0;
        $j = 0;
        foreach ($data as $key => $value) {
            if ($key == 'tbl' . $i) {
                $tmp = $value;
                if (in_array($value, $foreignKeys)) {
                    throw new \Exception($value . " Relation Already selected");
                }
                array_push($foreignKeys, $value);
                $i++;
            } elseif ($key == 'on' . $j) {
                if (!in_array($value, Schema::getColumnListing($tmp))) {
                    throw new \Exception($value . " Does not exist in " . $tmp);
                }
                array_push($onData, $value);
                $j++;
            }
        }

        $this->onData = $onData;

        $this->foreignKeys = $foreignKeys;
    }

    /**
     * Data for migration and views.
     *
     * @param string specification
     *
     * @return array $result
     */
    public function dataScaffold($spec)
    {
        if ($spec == 'migration') {
            $i = 0;
        } else {
            $i = 1;
        }
        $result = [];
        foreach ($this->data as $key => $value) {
            if ($i == 1) {
                $i = 0;
            } elseif ($i == 0) {
                if ($key == 'tbl0' || $key == 'on0') {
                    break;
                } else {
                    if (str_contains($value, " ")) {
                        $value = str_slug($value, '_');
                    }
                    array_push($result, $value);
                    $i = 1;
                }
            }
        }

        return $result;
    }

    /**
     * Get foreignKeys.
     */
    public function getForeignKeys()
    {
        return $this->foreignKeys;
    }

    /**
     * Get relational attributes.
     */
    public function getRelationAttributes()
    {
        return $this->relationAttributes;
    }

    /**
     * Get onData.
     */
    public function getOnData()
    {
        return $this->onData;
    }
}
