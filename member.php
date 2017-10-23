<?php

// A simple autoloader loads the php files in src
require 'simple_autoload.php';

/**
 * Font controller: main entry point of the application
 */
function main()
{
	// The best place to launch the session is probably here
	session_start();

    // The router gets the request and return the response
	$response = route($_SERVER['REQUEST_METHOD'], $_GET, $_POST);

	// Sends the response back
	echo $response;
}

main();
