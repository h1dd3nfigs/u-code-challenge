<?php 

require_once __DIR__ . '/../vendor/autoload.php';

use rfombrun\UbersmithApi\Controller as Controller;

if (session_id() === ""){

	$lifetime=600;
	session_set_cookie_params($lifetime);
	session_start();
}

include 'urlpatterns.php';
	
$request_method = $_SERVER['REQUEST_METHOD'];
$request_uri = $_SERVER['REQUEST_URI']; 
$query_string = isset($_SERVER['QUERY_STRING'])? $_SERVER['QUERY_STRING']:'';
$request_body = file_get_contents('php://input');

$api_command = '';

if(preg_match('/^\/api\/values/', $_SERVER["REQUEST_URI"])){

	try {

		foreach ($url_patterns as $route => $data) {
			
			// the requested URI and HTTP method must both match a pre-defined url pattern
			if(preg_match($data['pattern'], $request_uri) && $data['method'] ===$request_method){ 
				
				$api_command = $route;
				 break;
			}
		}

		if($api_command === ''){
			throw new \Exception(
							sprintf(
								"The requested resource '%s' was not found on this server.", 
								$request_uri
								)
							);
		}

	} catch (\Exception $e) {
		http_response_code(404);
		// die($e->getmessage());
		$response = array('status'=>'fail', 'error'=>http_response_code(),'msg'=>$e->getmessage() );
		// echo json_encode($response);
		die(json_encode($response));
	}

	$controller = new Controller($api_command, $request_uri, $request_body,$query_string );
	$controller->executeCommand();
}