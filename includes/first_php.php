<?php

//Attribution des variables de session


$lvl=(isset($_SESSION['level']))?(int) $_SESSION['level']:1;

$id=(isset($_SESSION['id']))?(int) $_SESSION['id']:0;

$username=(isset($_SESSION['username']))?$_SESSION['username']:'';

$picture=(isset($_SESSION['picture'])?$_SESSION['picture']:'');


//On inclue les 2 pages restantes

require_once("functions.php");

require_once("constants.php");

require_once('model/get_functions.php');

$sections = get_sections();

// On effectue du traitement sur les données (contrôleur)

// Ici, on doit surtout sécuriser l'affichage

foreach($sections as $key => $section){
	//sécurise les sections
	$sections[$key]['section_name'] = htmlspecialchars($section['section_name']);
}

?>