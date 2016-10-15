<?php

if(isset($_GET['location'])) {
	$redirect = $_GET['location'];
}

session_destroy();

require_once("includes/first_php.php");


if ($id==0) error(ERR_IS_NOT_CO);

// header("Location:ari.php?page=login&comment=logout");
header('Location:'.$redirect);

// $titre="Déconnexion";
// require_once("includes/first_html.php");