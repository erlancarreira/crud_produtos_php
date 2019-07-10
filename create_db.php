<?php 
ini_set('display_errors', 1);

include_once('config.php');

$sql = new PDO("mysql:host=localhost;dbname=",'root',''); 

if ($sql->exec("CREATE DATABASE IF NOT EXISTS shop DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;  ")) {

	$sql->exec("
		USE shop; 
		CREATE TABLE IF NOT EXISTS products 
		(
	        id INT NOT NULL AUTO_INCREMENT,
	        name VARCHAR(64) NOT NULL,
	        price DECIMAL(10,2) NOT NULL,
	        description TEXT NOT NULL,
	        image VARCHAR(255) NOT NULL, 
	        PRIMARY KEY (id)
	    )
	");


	echo " BANCO DE DADOS CRIADO COM SUCCESSO! "; 
}

