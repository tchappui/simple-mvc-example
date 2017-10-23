<?php

function user_add($email, $password)
{
	$db = database_get();
	
	if (filter_var($email, FILTER_VALIDATE_EMAIL))
	{
		$req = $db->prepare('
			INSERT INTO 
				membre (email, password) 
			VALUES
				(:email, :password)
			;
		');
		$req->bindValue('email', $email, PDO::PARAM_STR);
		$req->bindValue('password', $mdp, PDO::PARAM_STR);
		$req->execute();
	}
}

function user_get($email)
{
	$db = database_get();

	$stmt = $db->prepare('
		SELECT 
			id 
		FROM 
			member 
		WHERE 
			email = :email
		;
	');
	$stmt->bindValue('email', $email, PDO::PARAM_STR);
	$stmt->execute();

	return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function user_verify($email)
{
	$db = database_get();

	$stmt = $db->prepare('
		SELECT 
			email 
		FROM 
			member 
		WHERE 
			email = :email
		;
	');
	$stmt->bindValue('email', $email, PDO::PARAM_STR);
	$stmt->execute();
	return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
