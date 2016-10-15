<?php
$titre = "profil";
require_once("includes/first_html.php");
?>
<?php 
if($yourProfil){
	if(isset($i)){
		if($i==0){
			echo'<h1>Profil Modifié</h1>';

			echo'<p>'.$password_changed.'</p>';

        	echo'<p>'.$email_changed.'</p>';

        	echo'<p>'.$picture_changed.'</p>';
		}

		else {

			echo'<h1>Modification interrompue</h1>';

        	echo'<p>Une ou plusieurs erreurs se sont produites pendant la modification du profil</p>';

        	echo'<p>'.$i.' erreur(s)</p>';

        	echo'<p>'.$password_error1.'</p>';

        	echo'<p>'.$password_error2.'</p>';

        	echo'<p>'.$email_error1.'</p>';

        	echo'<p>'.$email_error2.'</p>';

        	echo'<p>'.$avatar_error.'</p>';

        	echo'<p>'.$avatar_error1.'</p>';

        	echo'<p>'.$avatar_error2.'</p>';

        	echo'<p>'.$avatar_error3.'</p>';
    	}
	}
	?>

<form method="post" action="ari.php?page=profil&amp;action=write" enctype="multipart/form-data">

	<?php }?>

	<fieldset><legend>Identifiants</legend>

		Pseudo : <strong><?php echo stripslashes(htmlspecialchars($member['member_username']));?></strong><br />
		Ce membre est inscrit depuis le

		<strong><?php echo $member['member_signinDate'];?></strong>

		<?php if($yourProfil){?>
		<p>Changer le mot de passe:</p>
		<label for="previousPassword">Ancien mot de Passe :</label>

		<input type="password" name="previousPassword" id="previousPassword" /><br />

		<label for="newPassword">Nouveau mot de Passe :</label>

		<input type="password" name="newPassword" id="newPassword" /><br />

		<label for="confirm">Confirmer le mot de passe :</label>

		<input type="password" name="confirm" id="confirm"  />

		<?php }?>

	</fieldset>



	<fieldset><legend>Contacts</legend>

		<label for="email">Votre adresse e-mail :</label>

		<?php if(!$yourProfil){?>
		<a href="mailto:<?php echo stripslashes($member['member_email']);?>">
			<?php echo stripslashes(htmlspecialchars($member['member_email']));?></a><br />
			<?php }?>


			<?php if($yourProfil){?>
			<input type="text" name="email" id="email"

			value="<?php echo $member['member_email'];?>" /><br />

			<?php }?>

		</fieldset>

		<fieldset><legend>Profil sur le forum</legend>
			<?php if($yourProfil){?>
			<label for="avatar">Changer votre avatar :</label>
			
			<input type="file" name="avatar" id="avatar" />

			(Taille max : 10 ko)<br /><br />
			<?php }?>

			<br />Avatar actuel :

			<img src="./images/avatars/<?php echo $member['member_picture'];?>" alt="pas d'avatar" />

			<br />
			<?php if($yourProfil && $member['member_picture'] != 0){?>
			<label><input type="checkbox" name="delete" value="Delete" />Supprimer l avatar</label>
			<?php }?>
			<br />


		</fieldset>

		<p>
			<?php if($yourProfil){?>
			<input type="submit" value="Modifier son profil" />

			<input type="hidden" id="sent" name="sent" value="1" />
			<?php }?>

		</p></form>
		<a href="<?php echo 'ari.php?page=profil&action=read&m='.$id;?>">voir son profil</a>
		<br />
		<a href="<?php echo 'ari.php?page=profil&action=write'?>">modifier son profil</a>