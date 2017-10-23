<?php

/**
 * Controller/action.
 *
 * Callable associated with the 'login' controller
 * and 'index' action.
 *
 * @return string Content for the http response.
 */
function login_index()
{
	return view('member/login/index', [
		'title' => "Connection à l'espace membre",
	]);
}

/**
 * Controller/action.
 *
 * Callable associated with the 'login' controller
 * and 'verify' action.
 *
 * @param string $method HTTP method used by the request.
 * @return string|null Content for the http response, or null if the method
 *                     is not supported.
 */
function login_verify($method)
{
	if ($method == 'POST')
	{
		return "Bravo, vous êtes bien connectés";
	}
}
