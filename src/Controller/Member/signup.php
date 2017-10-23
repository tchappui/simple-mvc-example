<?php

/**
 * Controller/action.
 *
 * Callable associated with the 'signup' controller
 * and 'index' action.
 *
 * @return string Content for the http response
 */
function signup_index()
{
	return view('member/signup/index', [
		'title' => "Inscription à l'espace membre"
	]);
}

/**
 * Controller/action.
 *
 * Callable associated with the 'signup' controller
 * and 'process' action.
 *
 * @param string $method HTTP method used by the request
 * @return string|null Content for the http response, or null 
 *                     if the method is not supported.
 */ function signup_process($method)
{
	if ($method == 'POST') {
		return 'Votre formulaire a été traité';
	}
}
