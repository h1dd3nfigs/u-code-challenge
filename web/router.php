<?php

// if the request uri is '/', serve the api's frontend ui form
if (preg_match('/^\/$/', $_SERVER["REQUEST_URI"])) {
	
    include __DIR__ . '/../views/frontend.php';

// if the request uri is '/api/values' with an optional query string, load the api's back end
} elseif(preg_match('/^\/api\/values(\?([\w-]+(=[\w-]*)?(&[\w-]+(=[\w-]*)?)*)?$|$)/', $_SERVER["REQUEST_URI"])) {

    include __DIR__ . '/index.php';

// otherwise, serve a 404 error
} else { 
		http_response_code(404);
		$response = array('status'=>'fail', 'error'=>http_response_code(),'msg'=>"The requested resource ".$_SERVER["REQUEST_URI"]." was not found on this server "  );
		die(json_encode($response));
		// return false;    

}


