<?php

namespace Amranidev\ScaffoldInterface\Http;

/**
 * Class Request.
 *
 * @author Amrani Houssain <amranidev@gmail.com>
 */
class Request
{
	/**
	 * @var array $reqest
	 */ 
	protected $request;

	/**
	 * set request.
	 * 
	 * @param array $request
	 * 
	 * @return void
	 */ 
	public function setRequest(array $request)
	{
		$this->request = $request;
	}
	/**
	 * Get request.
	 * 
	 * @return array $request
	 */ 
	public function getRequest() 
	{
		return $this->request;
	}
}
