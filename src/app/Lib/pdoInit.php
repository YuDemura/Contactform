<?php

function pdoInit(): PDO
{
    $dbUserName = 'root';
    $dbPassword = 'password';
    $pdo = new PDO("mysql:host=mysql; dbname=contactform; charset=utf8", $dbUserName, $dbPassword);
	return $pdo;
}
