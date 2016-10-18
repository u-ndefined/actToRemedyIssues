<?php
// Connexion à la base de données
try {
	$db = new PDO('mysql:host=localhost;dbname=testBDD;charset=utf8', 'root', 'root');
}
catch(Exception $e) {
        die('Error : '.$e->getMessage());
}