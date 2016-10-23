<?php

session_start();

require_once("controller/sql_login.php");
require_once("controller/first_php.php");
// if (!isset($_GET['page']) OR $_GET['page'] == 'index') require_once('controller/index.php');


	$titre = (isset($_GET['page'])?htmlspecialchars($_GET['page']):'');

	switch ($titre) {

		case 'login':
			require_once('controller/login.php');
			require_once("view/first_html.php");
			require_once('view/login.php');
			break;

		case 'logout':
			require_once('controller/logout.php');
			// require_once("view/first_html.php");
			// require_once('view/logout.php');
			break;

		case 'register':
			require_once('controller/register.php');
			require_once("view/first_html.php");
			require_once('view/register.php');
			break;

		case 'profil':
			require_once('controller/profil.php');
			require_once("view/first_html.php");
			require_once('view/profil.php');
			break;

		case 'post':
			require_once('controller/post.php');
			require_once("view/first_html.php");
			require_once('view/post.php');
			break;

		case 'section':
			require_once('controller/section.php');
			require_once("view/first_html.php");
			require_once('view/section.php');
			break;

		case 'modify':
			require_once('controller/modify.php');
			require_once("view/first_html.php");
			require_once('view/modify.php');
			break;

		case 'delete':
			require_once('controller/delete.php');
			require_once("view/first_html.php");
			require_once('view/delete.php');
			break;

		case 'mailbox':
			require_once('controller/mailbox.php');
			require_once("view/first_html.php");
			require_once('view/mailbox.php');
			break;

		case 'admin':
			require_once('controller/admin.php');
			require_once("view/first_html.php");
			require_once('view/admin.php');
			break;
		
		case 'modify_index':
			require_once('controller/modify_index.php');
			require_once("view/first_html.php");
			require_once('view/modify_index.php');
			break;

		case 'comment':
			require_once('controller/comment.php');
			require_once("view/first_html.php");
			require_once('view/comment.php');
			break;

		default:
			require_once('controller/index.php');
			require_once("view/first_html.php");
			require_once('view/index.php');
			break;
	}