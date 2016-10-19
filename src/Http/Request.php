<?php

namespace Amranidev\ScaffoldInterface\Http;

/**
 * class Request.
 *
 * @author Amrani Houssain <amranidev@gmail.com>
 */
class Request
{
	/**
	 * @var $reqest
	 */ 
	protected $request;

	/**
	 * set request.
	 * 
	 * @param array $request
	 */ 
	public function setRequest(array $request)
	{
		$this->request = $request;
	}
	/**
	 * get request.
	 * 
	 * @return array $request
	 */ 
	public function getRequest() 
	{
		return $this->request;
	}
}