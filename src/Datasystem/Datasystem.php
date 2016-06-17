<?php

namespace Amranidev\ScaffoldInterface\Datasystem;

use Illuminate\Support\Facades\Schema;

/**
 * Class     DataSystem.
 *
 *
 * @author   Amrani Houssain <amranidev@gmail.com>
 */
class Datasystem
{
    /**
     * Main interface reqeust.
     *
     * @var
     */
    private $data;

    /**
     * on data specification.
     *
     * @var
     */
    private $onData;

    /**
     * ForrignKeys and relations.
     *
     * @var
     */
    private $foreignKeys;

    /**
     * Relational Columns.
     *
     * @var
     */
    private $relationAttributes;

    /**
     * Create DataSystem instance.
     *
     * @param array Data
     */
    public function __construct($data)
    {
        // unset TableName
        unset($data['TableName']);

        // unset template
        unset($data['template']);

        $this->data = $data;

        $this->getAttr();

        $this->foreignKeys = $this->foreignKeys($data);

        $this->onData = $this->onData($data);
    }

    /**
     * Analyse data and attributes.
     *
     * @param array $data
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
     * deduce on data spec.
     *
     * @param array $data
     *
     * @return array
     */
    private function onData($data)
    {
        $array = collect($data);

        $array = $array->reject(function ($value, $key) {
            return !str_contains($key, 'on');
        });

        return array_values($array->toArray());
    }

    /**
     * deduce foreignKeys.
     *
     * @param array $data
     *
     * @return array
     */
    private function foreignKeys($data)
    {
        $array = collect($data);

        $array = $array->reject(function ($value, $key) {
            return !str_contains($key, 'tbl');
        });

        return array_values($array->toArray());
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
                    if (str_contains($value, ' ')) {
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

     /**
      * get request data.
      */
     public function getData()
     {
         return $this->data;
     }
}
