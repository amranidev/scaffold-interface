<?php
namespace Amranidev\ScaffoldInterface;

use Amranidev\ScaffoldInterface\Attributes;
use Illuminate\Database\Eloquent\Model;

/**
 * class AutoArray
 *
 * @author Amrani Houssain <amranidev@gmail.com>
 *
 */
class AutoArray
{
    /**
     * Result Array
     *
     * @var $result
     */
    public $result = [];
    /**
     * Get Table Attribute (an Attributes Instance)
     *
     * @var $attributes
     */
    private $attributes;
    /**
     * create new AutoArray instance
     *
     * @var $table String
     */
    public function __construct($table)
    {
        $this->attributes = new Attributes($table);
    }
    /**
     * arrayAnalyser . add specified types from attributes
     *
     * @var $input Array
     *
     * @return $result
     */
    public function arrayAnalyzer($input)
    {
        $result = [];
        foreach ($input as $key => $value) {
            if ($key == "Field") {
                $result[] = $value;
            }
        }

        return $result;
    }
    /**
     * get result from attributes and arrayAnalyzer
     *
     * @return $result
     */
    public function getResult()
    {
        $result = [];
        foreach ($this->attributes->getAttributes() as $key) {
            $result[] = $this->arrayAnalyzer($key);
        }
        return $result;
    }
    /**
     * merge : get the final result and inject (name,type,key,value)
     *
     * @return $this->result
     */
    public function merge()
    {
        $array = $this->getResult();
        foreach ($array as $key => $value) {
            $value['name'] = $value['0'];
            $value['type'] = $value['1'];
            $value['key'] = $value['0'] . ' :';
            $value['value'] = '';
            unset($value['1']);
            unset($value['0']);
            $this->result[] = $value;
        }
        return $this->result;
    }
    /**
     * get simple array from Model
     *
     * @param Model $model
     *
     * @return $result
     */
    public function getModelArray(Model $model)
    {
        $result = [];
        foreach ($model->getAttributes() as $key => $value) {
            $result[] = ['type' => 'text', 'name' => $key, 'key' => $key . ' :', 'value' => $value];
        }
        unset($result[0]);
        return $result;
    }
}
