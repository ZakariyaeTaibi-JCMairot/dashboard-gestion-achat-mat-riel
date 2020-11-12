<?php
// lien vers la base de données

$pdo= new PDO('mysql:host=localhost;dbname=crudzak','root','',array(
	PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,	
	PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
));


?>