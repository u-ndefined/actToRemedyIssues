<?php
require_once("includes/first_php.php");

require_once("model/get_functions.php");
require_once("model/set_functions.php");

if(!empty($_POST['username'])){

	$username_error1 = NULL;

	$username_error2 = NULL;

	$password_error = NULL;

	$email_error1 = NULL;

	$email_error2 = NULL;

	$avatar_error = NULL;

	$avatar_error1 = NULL;

	$avatar_error2 = NULL;

	$avatar_error3 = NULL;

    //On récupère les variables

	$i = 0;

	$date = date('Y-m-d H:i:s');

	$username= htmlspecialchars($_POST['username']);

	$email = htmlspecialchars($_POST['email']);

	$password = md5($_POST['password']);

	$confirm = md5($_POST['confirm']);

	$rank = 2;

    //Vérification du pseudo

    $username_alreadyTaken = alreadyTaken('username', $username);
    $email_alreadyTaken = alreadyTaken('email',$email);

	if($username_alreadyTaken)

	{

		$username_error1 = "Votre pseudo est déjà utilisé par un membre";

		$i++;

	}


	if (strlen($username) < 3 || strlen($username) > 15)

	{

		$username_error2 = "Votre pseudo est soit trop grand, soit trop petit";

		$i++;

	}

    //Vérification du mdp

	if ($password != $confirm || empty($_POST['password']) || empty($_POST['confirm']))

	{

		$password_error = "Votre mot de passe et votre confirmation diffèrent, ou sont vides";

		$i++;

	}

    //Il faut que l'adresse email n'ait jamais été utilisée

	if($email_alreadyTaken)

	{

		$email_error1 = "Votre adresse email est déjà utilisée par un membre";

		$i++;

	}

    //On vérifie la forme maintenant

	if (!preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$#", $email) || empty($email))

	{

		$email_error2 = "Votre adresse E-Mail n'a pas un format valide";

		$i++;

	}


     //Vérification de l'avatar :

	if (!empty($_FILES['avatar']['size']))

	{

        //On définit les variables :

        $maxsize = 10024; //Poid de l'image

        $maxwidth = 100; //Largeur de l'image

        $maxheight = 100; //Longueur de l'image

        $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png', 'bmp' ); //Liste des extensions valides

        

        if ($_FILES['avatar']['error'] > 0)

        {

        	$avatar_error = "Erreur lors du transfert de l'avatar : ";

        }

        if ($_FILES['avatar']['size'] > $maxsize)

        {

        	$i++;

        	$avatar_error1 = "Le fichier est trop gros : (<strong>".$_FILES['avatar']['size']." Octets</strong>    contre <strong>".$maxsize." Octets</strong>)";

        }


        $image_sizes = getimagesize($_FILES['avatar']['tmp_name']);

        if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight)

        {

        	$i++;

        	$avatar_error2 = "Image trop large ou trop longue : (<strong>".$image_sizes[0]."x".$image_sizes[1]."</strong> contre <strong>".$maxwidth."x".$maxheight."</strong>)";

        }

        

        $extension_upload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.')  ,1));

        if (!in_array($extension_upload,$extensions_valides) )

        {

        	$i++;

        	$avatar_error3 = "Extension de l'avatar incorrecte";

        }

    }

    if ($i==0)

    {
        $pictureName = '';

        if(!empty($_FILES['avatar']['size'])) $pictureName = move_avatar($_FILES['avatar']);

    	newMember($username, $password, $email, $pictureName, $date);

    	header("Location:ari.php?page=login&comment=register");

    }
}

require_once("view/register.php");