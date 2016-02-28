<?php

// ajax test router
if (preg_match('/^\/main$/', $_SERVER["REQUEST_URI"])) {

    include __DIR__ . '/frontend.php';

// } elseif(preg_match('/^\/gethint$/', $_SERVER["REQUEST_URI"])) {

//     include __DIR__ . '/frontlogic.php';

} else { 
	echo 'can you see me?';
	return false;    // serve 404 error

}


