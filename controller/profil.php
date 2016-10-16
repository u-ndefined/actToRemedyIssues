<?php

$action = isset($_GET['action'])?htmlspecialchars($_GET['action']):'read';

$memberID = isset($_GET['m'])?(int) $_GET['m']:'';

switch ($action) {
	case 'read':
	$member = get_memberByID($memberID);
	$yourProfil = False;
	break;
	
	case 'write':
	if (empty($_POST['sent'])){
		if ($id==0) error(ERR_IS_NOT_CO);

		$member = get_memberByID($id);

		$yourProfil = True;
	}
	else {
		if ($id==0) error(ERR_IS_NOT_CO);

		$member = get_memberByID($id);

		$yourProfil = True;

		$password_error1 = NULL;

		$password_error2 = NULL;

		$email_error1 = NULL;

		$email_error2 = NULL;

		$avatar_error = NULL;

		$avatar_error1 = NULL;

		$avatar_error2 = NULL;

		$avatar_error3 = NULL;


		$password_changed = NULL;

		$email_changed = NULL;

		$picture_changed = NULL;


    //Encore et toujours notre belle variable $i :p

		$i = 0;

		$date = date('Y-m-d H:i:s');

		$email =(empty($_POST['email'])?False:$_POST['email']);

		$previousPassword = (empty($_POST['previousPassword'])?False:md5($_POST['previousPassword']));

		$newPassword = (empty($_POST['newPassword'])?False:md5($_POST['newPassword']));

		$confirm = (empty($_POST['confirm'])?False:md5($_POST['confirm']));



		//Vérification du mdp

		if($previousPassword != false){

		if(!isset($previousPassword) || $member['member_password'] != $previousPassword) {
			$password_error1 = "Votre ancien mot de passe ne correspond pas";
			$i++;
		}

		if (empty($newPassword) || empty($confirm) || $newPassword != $confirm){
			$password_error2 = "Votre mot de passe et votre confirmation diffèrent ou sont vides";
			$i++;
		}

		if($password_error1 == NULL && $password_error2 === NULL) $password_changed ="Votre mot de passe a été changé avec succés";
	}

		if($email != false){

		if (strtolower($member['member_email']) != strtolower($email)) {

        	//Il faut que l'adresse email n'ait jamais été utilisée
			$email_alreadyTaken = alreadyTaken('email', $email);

			if($email_alreadyTaken) {
				$email_error1 = "Votre adresse email est déjà utilisé par un membre";
				$i++;
			}
        	//On vérifie la forme maintenant

			if (!preg_match("#^[a-z0-9A-Z._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email) || empty($email)){
				$email_error2 = "Votre nouvelle adresse E-Mail n'a pas un format valide";
				$i++;
			}
			if($email_error1 == NULL && $password_error2 === NULL) $email_changed ="Votre email a été changé avec succés";
		}
		
	}
			if (!empty($_FILES['avatar']['size'])){

       			//On définit les variables :

        		$maxsize = 30072; //Poid de l'image

        		$maxwidth = 100; //Largeur de l'image

        		$maxheight = 100; //Longueur de l'image

        		//Liste des extensions valides

        		$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png', 'bmp' );

        		if ($_FILES['avatar']['error'] > 0){
        			$avatar_error = "Erreur lors du tranfsert de l'avatar : ";
        		}

        		if ($_FILES['avatar']['size'] > $maxsize){
        			$i++;
        			$avatar_error1 = "Le fichier est trop gros : (<strong>".$_FILES['avatar']['size']." Octets</strong>
        				contre <strong>".$maxsize." Octets</strong>)";
				}

				$image_sizes = getimagesize($_FILES['avatar']['tmp_name']);

				if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight){
					$i++;
					$avatar_error2 = "Image trop large ou trop longue : (<strong>".$image_sizes[0]."x".$image_sizes[1]."</strong> contre<strong>".$maxwidth."x".$maxheight."</strong>)";
				}

				$extension_upload = strtolower(substr(  strrchr($_FILES['avatar']['name'], '.')  ,1));

				if (!in_array($extension_upload,$extensions_valides) ) {
					$i++;
					$avatar_error3 = "Extension de l'avatar incorrecte";
				}

				if($avatar_error1 == NULL && $avatar_error2 === NULL && $avatar_error3 === NULL) $picture_changed ="Votre image a été changée avec succés";
			}

				if ($i == 0){ // Si $i est vide, il n'y a pas d'erreur
					if (!empty($_FILES['avatar']['size']) || isset($_POST['delete'])){
						$pictureName = 0;
						if(!empty($_FILES['avatar']['size']))$pictureName=move_avatar($_FILES['avatar']);
							update_memberPicture($id, $pictureName);
						}
					update_member($newPassword, $email, $id);
					$member = get_memberByID($id);
					}
			
		}

	break;

	default:
	echo'Bizarre o_O';
	break;
}