<?php 

require_once __DIR__ . '/../vendor/autoload.php';

use rfombrun\UbersmithApi\Controller as Controller;

if (session_id() === ""){
	$lifetime=600;
	session_set_cookie_params($lifetime);

	session_start();
	// setcookie(session_name(),session_id(),time()+$lifetime);
}
// echo session_save_path();

include 'urlpatterns.php';
include __DIR__ . '/router.php';

// echo '<br><br>is anybody out there?<br><br>';

// if(isset($_POST["api_endpoint"]))
// 	echo 'the api endpoint is '.$_POST["api_endpoint"];

// if (session_status() == PHP_SESSION_NONE) {
//     session_start();
//     echo 'starting new session now';
// }

// echo "<h2>Welcome to PHP, biatches!!!!</h2><p>#beyoncebombed #slay</p><br>";

// use $request_method from form instead of from $_SERVER var
// $request_method = $_SERVER['REQUEST_METHOD'];

//use $api_endpoint from form instead of $request_uri when dealing with frontend ui
// $request_uri = $_SERVER['REQUEST_URI']; 
$query_string = isset($_SERVER['QUERY_STRING'])? $_SERVER['QUERY_STRING']:'';
$request_body = file_get_contents('php://input');

$api_command = '';

try {

	foreach ($url_patterns as $route => $data) {
		
		// the requested URI and HTTP method must both match the url pattern
		if(preg_match($data['pattern'], $api_endpoint) && $data['method'] ===$request_method){ 
			$api_command = $route;
			 // echo 'requested uri matches '.$route.' action<br><br>';
			 break;
		}
	}

	if($api_command === ''){
		throw new \Exception(
						sprintf(
							"There are no url patterns to match the requested URI '%s' ", 
							$request_uri
							)
						);
	}


} catch (\Exception $e) {
		
	header("HTTP/1.1 404 Not Found");
	die($e->getmessage());

}



// $path = strtok($_SERVER["REQUEST_URI"],'?');
// $request_method = $_SERVER['REQUEST_METHOD'];

// echo '<br><br>method ='.$request_method.'<br>';
// echo '<br><br>request body ='.$requestBody.'<br>';

// var_dump($request_body);
$controller = new Controller($api_command, $request_uri, $request_body,$query_string );
$controller->executeCommand();

// $query_string = $_SERVER['QUERY_STRING'];

// echo $request_uri.'<br>'.$url.'<br>'.$query_string.'<br>';

// parse_str($query_string);
// var_dump($vid);