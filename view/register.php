<?php
if($i>0){ //si déjà post, afficher erreurs
	echo'<h1>Inscription échouée (t\'es nul)</h1>';

    	echo'<p>Une ou plusieurs erreurs se sont produites pendant l incription</p>';

    	echo'<p>'.$i.' erreur(s)</p>';

    	echo'<p>'.$username_error1.'</p>';

    	echo'<p>'.$username_error2.'</p>';

    	echo'<p>'.$password_error.'</p>';

    	echo'<p>'.$email_error1.'</p>';

    	echo'<p>'.$email_error2.'</p>';

    	echo'<p>'.$avatar_error.'</p>';

    	echo'<p>'.$avatar_error1.'</p>';

    	echo'<p>'.$avatar_error2.'</p>';

    	echo'<p>'.$avatar_error3.'</p>';

    	echo'<p>Cliquez <a href="./ari.php?page=register">ici</a> pour recommencer</p>';
}
?>
	<h1>Inscription</h1>

	<form method="post" action="ari.php?page=register" enctype="multipart/form-data">

		<fieldset><legend>Identifiants</legend>

			<label for="username">* Pseudo :</label>  <input name="username" type="text" id="username" /> (le pseudo doit contenir entre 3 et 15 caractères)<br />

			<label for="password">* Mot de Passe :</label><input type="password" name="password" id="password" /><br />

			<label for="confirm">* Confirmer le mot de passe :</label><input type="password" name="confirm" id="confirm" />

		</fieldset>

		<fieldset><legend>Contacts</legend>

			<label for="email">* Votre adresse Mail :</label><input type="text" name="email" id="email" /><br />

		</fieldset>

		<fieldset><legend>Avatar Picture</legend>

			<label for="avatar">Choisissez votre avatar :</label><input type="file" name="avatar" id="avatar" />(Taille max : 10Ko<br />

		</fieldset>

		<p>Les champs précédés d un * sont obligatoires</p>

		<p><input type="submit" value="register" /></p>
	</form>

	</div>

</body>

</html>