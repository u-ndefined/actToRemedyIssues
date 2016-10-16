<?php

$redirect = (isset($_GET['location'])?htmlspecialchars($_GET['location']):'ari.php');

session_destroy();

// require_once("includes/first_php.php");


// header("Location:ari.php?page=login&comment=logout");
header('Location:'.$redirect);

// $titre="Déconnexion";
// require_once("includes/first_html.php");