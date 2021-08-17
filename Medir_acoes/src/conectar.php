<?php


try
{

	$hostname= "localhost";

	$user="root";

	$password = "";

	$base= "medir_acoes";

	$conectar = new PDO("mysql:host=$hostname;dbname=$base; charset=utf8", $user, $password);

	
} catch (Exception $e)
{
	throw new PDOException($e);
}



?>