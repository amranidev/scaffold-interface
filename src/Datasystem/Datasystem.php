<?php

namespace Amranidev\ScaffoldInterface\Datasystem;

use Illuminate\Support\Facades\Schema;

/**
 * Class DataSystem.
 *
 *
 * @author Amrani Houssain <amranidev@gmail.com>
 */
class Datasystem
{
    /**
     * Main interface request.
     *
     * @var array
     */
    private $data;

    /**
     * on data specification.
     *
     * @var array
     */
    private $onData;

    /**
     * ForeignKeys and relations.
     *
     * @var array
     */
    private $foreignKeys;

    /**
     * Relational columns.
     *
     * @var array
     */
    private $relationAttributes;

    /**
     * Create a new DataSystem instance.
     *
     * @param array $request
     *
     * @return void
     */
    public function __construct($request)
    {
        // unset TableName
        unset($request['TableName']);

        // unset template
        unset($request['template']);

        $this->data = $request;

        $this->relationData();

        $this->getAttributes();
    }

    /**
     * Deduce relational arttributes.
     *
     * @return void
     */
    private function getAttributes()
    {
        collect($this->foreignKeys)->each(function ($key, $value) {
            $Schema = collect(Schema::getColumnListing($key));
            $Schema = $Schema->reject(function ($value, $key) {
                return str_contains($value, 'id');
            });
            $this->relationAttributes[$key] = $Schema->toArray();
        });
    }

    /**
     * Deduce onData and foreingKeys.
     *
     * @return void
     */
    private function relationData()
    {
        $onData = collect($this->data)->reject(function ($value, $key) {
            return !str_contains($key, 'on');
        });

        $foreignKeys = collect($this->data)->reject(function ($value, $key) {
            return !str_contains($key, 'tbl');
        });

        $this->onData = array_values($onData->toArray());

        $this->foreignKeys = array_values($foreignKeys->toArray());
    }

    /**
     * Data for migration and views.
     *
     * @param string specification
     *
     * @return array
     */
    public function dataScaffold($spec = null)
    {
        $data = collect($this->data)->reject(function ($value, $key) use ($spec) {
            if ($spec == 'migration') {
                return !str_contains($key, 'opt');
            }

            return !str_contains($key, 'atr');
        });

        return array_values($data->toArray());
    }

    /**
     * Get foreignKeys.
     *
     * @return string
     */
    public function getForeignKeys()
    {
        return $this->foreignKeys;
    }

    /**
     * Get relational attributes.
     *
     * @return string
     */
    public function getRelationAttributes()
    {
        return $this->relationAttributes;
    }

    /**
     * Check timestamps.
     *
     * @return bool
     */
    public function isTimestamps()
    {
        return array_key_exists('timestamps', $this->data) ? true : false;
    }

    /**
     * Check SoftDeletes.
     *
     * @return bool
     */
    public function isSoftdeletes()
    {
        return array_key_exists('softdeletes', $this->data) ? true : false;
    }

    /**
     * Get onData.
     *
     * @return string
     */
    public function getOnData()
    {
        return $this->onData;
    }

    /**
     * get request data.
     *
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }
}
