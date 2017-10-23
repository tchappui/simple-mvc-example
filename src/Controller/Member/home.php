<?php

/**
 * Controller/action.
 *
 * Callable associated with the 'home' controller
 * and 'index' action.
 *
 * @return string Content for the http response
 */
function home_index()
{
	return view('member/home/index', [
		'title' => "Bienvenue sur votre espace membre",
	]);
}
