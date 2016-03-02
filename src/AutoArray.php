<?php
namespace Amranidev\ScaffoldInterface;

use Amranidev\ScaffoldInterface\Attributes;

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
        $result = null;

        foreach ($input as $key => $value) {
            if ($key == "Field") {
                $result = $value;
                break;
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
}
