<?php

namespace rfombrun\UbersmithApi ;

class Request
{
	private $method;
	private $path;
	private $query_string;

	public function __construct()
	{
		$this->method = $_SERVER['REQUEST_METHOD'];
		$this->path = strtok($_SERVER["REQUEST_URI"],'?');
		$this->query_string = $_SERVER['QUERY_STRING'];
	} 		

}