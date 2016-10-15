<?php

session_start();

require_once("includes/sql_login.php");
// if (!isset($_GET['page']) OR $_GET['page'] == 'index') require_once('controller/index.php');

if(isset($_GET['page'])){
	$page = $_GET['page'];

	switch ($_GET['page']) {
		case 'login':
			require_once('controller/login.php');
			break;

		case 'logout':
			require_once('controller/logout.php');
			break;

		case 'register':
			require_once('controller/register.php');
			break;

		case 'profil':
			require_once('controller/profil.php');
			break;

		case 'post':
			require_once('controller/post.php');
			break;
		
		default:
			require_once('controller/index.php');
			break;
	}
}
else require_once('controller/index.php');