<?php


include __DIR__ . '/../views/frontend.php';

if (isset($_POST['api_endpoint']) && !empty($_POST['api_endpoint'])) {
	
	$api_endpoint = filter_input(INPUT_POST, 'api_endpoint', FILTER_SANITIZE_STRING);
	$request_method = filter_input(INPUT_POST, 'request_method', FILTER_SANITIZE_STRING);
	$key1 = filter_input(INPUT_POST, 'key1', FILTER_SANITIZE_STRING);
	$value1 = filter_input(INPUT_POST, 'value1', FILTER_SANITIZE_STRING);

	// //Only allow URIs that start with /api/values
	// if (!preg_match('/^\/api\/values/', $_SERVER["REQUEST_URI"])) {
	if (!preg_match('/^http:\/\/localhost\/api\/values/', $api_endpoint)) {
	    
	    return false;    // serve 404 error

	} else { 

	    // include __DIR__ . '/index.php';
		// echo 'form is submitted';
	}

} else {

	echo 'form not yet submitted';
}


