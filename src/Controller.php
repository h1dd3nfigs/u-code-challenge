<?php

namespace rfombrun\UbersmithApi ;

use rfombrun\UbersmithApi\Model as Model;

class Controller
{		

	protected $command_options = array(
						'create' =>array(),						
						'get'    =>array(),
						'getAll' =>array(),
						'update' =>array(),						
						'delete' =>array(),						
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

			// if the command supplied is on the allowed list of commands, execute it's callback
			if(in_array($this->command, $this->command_options)){
				throw new \Exception(
					sprintf(
						"The requested resource '%s' was not found on this server.", 
						// "The route '%s' is not allowed", 
						// $this->command
						$this->request_uri 
						)
					);
			}

			return call_user_func(array($this, $this->command));

		} catch (\Exception $e) {

			http_response_code(404);
			$response = array('status'=>'fail', 'error'=>http_response_code(),'msg'=>$e->getmessage() );
			die(json_encode($response));
		}
	}

	public function create()
	{
		parse_str($this->request_body);
		$model = new Model();
		$status = $model->set($key, $value);

		if($status){
			echo json_encode(array('status'=>'ok'));
			// parse_str($this->request_body, $output);
			// echo json_encode($output);
			// echo "<br><br><p>Created a new key-value pair $key - $value</p><br><br>";

		}

	}

	public function get()
	{
		parse_str($this->query_string);
		$model = new Model();
		$value = $model->get($key);
		
		if(isset($value)){
			echo json_encode(array('key'=>$key, 'value'=>$value));
			// "<p>The value for a key '$key' is '$value'</p>";
			// return json_encode(array('key'=>$key, 'value'=>$value));
		} else {
			http_response_code(404);
			$response = array('status'=>'fail', 'error'=>http_response_code(),'msg'=>"The requested resource ".$_SERVER["REQUEST_URI"]." was not found on this server "  );
			echo json_encode($response);
			// echo'Couldn\'t find a val for that key';

		}
	}

	public function getAll()
	{
		$model = new Model();
		$arr = $model->getAll();
		
		if($arr){
			// $keys = array_keys($arr);
			// $values = array_values($arr);
			$response = array();
			$i = 0;
			foreach ($arr as $key=>$value) {
				$response[$i]['key']= $key;
				$response[$i]['value']= $value;
				$i++;
			}
			// print_r($response);
			$output = array('data'=>$response);
			echo json_encode($output);
		}
			
	}

	public function update()
	{
		parse_str($this->request_body);
		parse_str($this->query_string);

		$model = new Model();
		$status = $model->set($key, $value);

		if($status){
			echo json_encode(array('status'=>'ok'));
			echo "<p>Updated an existing key-value pair<br>for key '$key' the value is now '$value'</p><br><br>";
		}
	}

	public function delete()
	{
		parse_str($this->query_string);
		$model = new Model();
		$status = $model->delete($key);

		if($status){
			echo json_encode(array('status'=>'ok'));
			echo "<p>Deleted the value for key '$key' key</p>";
		}
	}
}