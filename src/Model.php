<?php

namespace rfombrun\UbersmithApi ;

// session_start();

/**
 * $_SESSION array used as the api's data layer
 */
class Model
{ 
	// how to specify a namespace for all the keys that we set??
	private $namespace;

	public function __construct()
	{

	}
	// public function __construct($namespace)
	// {
	// 	$this->namespace = $namespace; // or should this namespace/namespace be the sessionID
	// }

	public function get($key)
	{
		if(isset($_SESSION[$key]))
			return $_SESSION[$key];

		return null;
	}
	// public function get($key)
	// {
	// 	// return $_SESSION[$key];
	// 	if(isset($_SESSION[$this->namespace][$key]))
	// 		return $_SESSION[$this->namespace][$key];

	// 	return null;
	// } 		

	// public function set($key, $value)
	// {
	// 	// $_SESSION[$key]=$value;
	// 	$_SESSION[$this->namespace][$key]=$value;

	// 	if($this->get($key)=== $value)
	// 		return true;
	// } 		

	public function set($key, $value)
	{
		$_SESSION[$key]=$value;

		if($this->get($key)=== $value)
			return true;
		// if(self::get($key)=== $value)

	    // session_write_close();

	} 		

	public function getAll()
	{
		// how to specify a namespace for all the keys that we set??
		return $_SESSION[$this->namespace];
	} 		

	public function delete($key)
	{
		// unset($_SESSION[$key]);
		unset($_SESSION[$this->namespace][$key]);
		// return true;
	} 		
}