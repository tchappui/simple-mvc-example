<?php

function route($method, $query, $request)
{
	// Sets controller and action from query string with default values
	$controller = empty($query['controller']) ? 'home' : $query['controller'];
	$action = empty($query['action']) ? 'index' : $query['action'];

	// Setups the appropriate function to handle the request
	$handle_request = "{$controller}_{$action}";

	// Executes the handle_request function and return the response
    return $handle_request();
}
