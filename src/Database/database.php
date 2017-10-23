<?php

/**
 * Instantiates the database connection service and returns
 * the associated PDO object, or null in case of failure. 
 *
 * @return PDO Object abstracting the database connection.
 */
function database_get() 
{
	static $db = null;

	// Database configuration is loaded from the dbconfig file
	$config = require 'dbconfig.php';

	// The database service is only instanciated once
	if (!$db) {
		$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
		try
		{
			$db = new PDO(
				"mysql:host={$config['host']};dbname={$config['dbname']}", 
				$config['user'], 
				$config['passwd'], 
				$options
			);
		}
		catch(Exception $e)
		{
			// A null object is returned to the caller in case of error.
			$db = null;
		}
	}
	return $db;
}

