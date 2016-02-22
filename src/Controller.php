<?php

namespace rfombrun\UbersmithApi ;

use rfombrun\UbersmithApi\Model as Model;


class Controller
{
	/*
	grab request data and decide which action to perform, i.e. method to call,
	interface with model.php
	*/ 		

	protected $command_options = array(

						'create'    =>array(
										// 'method'=> 'POST',
										// 'pattern'=>'/\/api\/values/',
										//'path'=> '/api/values',
										'params'=> array(),
										'body_params' => array('key','value')
										),						
						'get'    =>array(
										// 'method'=> 'GET',
										// 'pattern'=>'/\/api\/values[?]key=*/',
										// 'path'=> '/api/values',
										'params'=> array('key'),
										'body_params' => array()
										),
						'getAll'   =>array(
										// 'method'=> 'GET',
										// 'pattern'=>'/\/api\/values/',
										// 'path'=> '/api/values',
										'params'=> array(),
										'body_params' => array()
										),
						'update' =>array(
										// 'method'=> 'PUT',
										// 'pattern'=>'/\/api\/values/',
										// 'path'=> 'api/values',
										'params'=> array(),
										'body_params' => array('key')
										),						
						'delete' =>array(
										// 'method'=> 'DELETE',
										// 'pattern'=>'/\/api\/values[?]key=*/',
										// 'path'=> 'api/values',
										'params'=> array('key'),
										'body_params' => array()
										),						
					);
	private $command;
	private $request_uri;
	private $query_string;

	public function __construct($command, $request_uri, $request_body, $query_string)
	{
		$this->command = $command;
		$this->request_uri = $request_uri;
		$this->request_body = $request_body;
		$this->query_string = $query_string;
	
	}

	public function executeCommand()
	{
		try {

			// if the command supplied is on the allowed list of commands, then execute it's callback function		
			if(!array_key_exists($this->command, $this->command_options)){
				throw new \Exception(
					sprintf(
						"The route '%s' is not allowed", 
						$this->command
						)
					);
			}
			
			return call_user_func(array($this, $this->command));

		} catch (\Exception $e) {

			echo $e->getmessage();
		}
	}

	public function create()
	{
		// var_dump($_COOKIE["PHPSESSID"]);
		parse_str($this->request_body);
		$model = new Model();
		$status = $model->set($key, $value);
		// $status = Model::set($key, $value);

		// $model = new Model('namespace');
		if($status){
			echo "<p>Created a new key-value pair $key - $value</p><br><br>";
			echo '<p>once again'.$key.': '.$model->get($key);
			// echo '<p>once again'.$key.': '.Model::get($key);
			echo '<br><br>session id is '.SID;
		}

	}

	public function get()
	{
		// var_dump($_COOKIE["PHPSESSID"]);
		// echo '<br><br>session id is '.SID;
		// echo session_status();return;
		// var_dump($_SESSION);return;
		// echo $_SESSION['namespace']['mykey'];
		parse_str($this->query_string);
		// echo 'key is'.$key;exit;

		$model = new Model('namespace');
		$value = $model->get($key);
		// $value = Model::get($key);
		
		if($value)
			echo "<p>The value for a key '$key' is '$value'</p>";
	}

	public function getAll()
	{
		echo "<p>List of all keys</p>";
	}

	public function update()
	{
		echo "<p>Update a key</p>";
	}

	public function delete()
	{
		echo "<p>Deleted a key</p>";
	}
}