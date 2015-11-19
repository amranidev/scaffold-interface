<?php
namespace Amranidev\ScaffoldInterface\DataSystem

class DataSystem
{
	/**
	 * Data Reqeust from interface
	 * 
	 * @var $data Array
	 */ 
	public $data;


	/**
	 * Create new DataSystem instance
	 * 
	 * @var $data Array
	 */ 
	public function __construct($data)
	{
		$this->data = $data;
	}

	/**
	 * to fetch between migration and views
	 * 
	 * @var $spec String
	 */ 
	public function dataScaffold($spec)
	{
		unset($this->data['TableName']);
        if ($spec == 'migration') {
            $i = 0;
        } else {
            $i = 1;
        }
        $request = [];
        foreach ($this->data as $key => $value) {
            if ($i == 1) {
                $i = 0;
            } elseif ($i == 0) {
                array_push($request, $value);
                $i = 1;
            }
        }
        return $request;
	}

}