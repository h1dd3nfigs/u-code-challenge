<?php

namespace rfombrun\UbersmithApi ;

/**
 * $_SESSION array used as the api's data layer
 */
class Model
{ 

	public function __construct(){}

	public function get($key)
	{
		if(isset($_SESSION[$key]))
			return $_SESSION[$key];

		return null;
	}

	public function set($key, $value)
	{
		$_SESSION[$key]=$value;

		if($this->get($key)=== $value)
			return true;

	} 		

	public function getAll()
	{
		return $_SESSION;
	} 		

	public function delete($key)
	{
		unset($_SESSION[$key]);
		// session_unset();return true; // quick way to delete all test/junk session data
		if($this->get($key)=== null)
			return true;
	} 		
}