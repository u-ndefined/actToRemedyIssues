<?php
require_once("includes/first_php.php");
require_once('model/get_functions.php');

$redirect = NULL;
if(isset($_POST['location']) && $_POST['location'] != '') {
	$redirect = $_POST['location'];
}

if(isset($_GET['comment'])){
	switch ($_GET['comment']) {
		case 'register':
			$message = '<p>Vous êtes maintenant inscrit</p><p>Vous pouvez à présent vous connecter</p>';
			break;

		case 'logout':
			$message = '<p>Vous êtes maintenant déconnecté</p><p>Vous pouvez à présent vous connecter</p>';
			break;
		
		default:
			$message = '<p>Bizarre...';
			break;
	}
}

if (isset($_POST['username'])){ //si l'utilisateur a envoyer le formulaire

	$message=''; //on met message à 0

	if(empty($_POST['username']) || empty($_POST['password']) ){ //s'il manque une info
	$message = '<p>une erreur s\'est produite pendant votre identification.
	Vous devez remplir tous les champs</p>';
}

else {

	$member = get_memberByName($_POST['username']); //recuperation des infos en fonction de l'username

	if ($member['member_password'] == md5($_POST['password'])){ // Acces OK !
		$_SESSION['username'] = $member['member_username'];
		$_SESSION['level'] = $member['member_rank'];
		$_SESSION['id'] = $member['member_id'];
		$_SESSION['picture'] = $member['member_picture'];
		$message = '<p>Bienvenue '.$member['member_username'].', 
		vous êtes maintenant connecté!</p>
		<p>Cliquez <a href="./ari.php">ici</a> 
		pour revenir à la page d accueil</p>
		<p>Cliquez <a href="'.$redirect.'">ici</a> pour revenir à la page précédente';

		// if (isset($_POST['rememberMe'])) {
		// 	$expire = time() + 365*24*3600;
		// 	setcookie('username', $_SESSION['username'], $expire);
		// 	setcookie('password', $_SESSION['password'], $expire); 
		// }
		
		
		// if($redirect) echo '<script> window.location.assign("'.$redirect.'"); </script>';
 	// 	else echo '<script> window.location.assign("ari.php"); </script>';
 		if($redirect) header("Location:".$redirect);
 		else header("Location:ari.php");
	}
	else { // Acces pas OK !
		$message = '<p>Une erreur s\'est produite 
		pendant votre identification.<br /> Le mot de passe ou le pseudo 
		entré n\'est pas correcte.</p>';
	}
}
}


require_once("view/login.php");