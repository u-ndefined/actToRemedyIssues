<?php
if($id == 0) {
	?>
	<form method="post" action="ari.php?page=login" id="mini_login">
	<fieldset>
		<legend>Log in</legend>
		<p>
			<label for="username">username :</label><input name="username" type="text" id="username" /><br />
			<label for="password">password :</label><input type="password" name="password" id="password" />
		</p>
	
	<input type="hidden" name="location" value="<?php echo toValidURL($_SERVER['REQUEST_URI']);?>"/>
	<input type="submit" value="login" />
	<a href="./ari.php?page=register">register?</a>
	</fieldset>
	</form>
	<?php
}
else {
	?>
	<div id="mini_profil">
		<div id="mini_profil_user">
			<img id="mini_profil_picture" src="./images/avatars/<?php echo $picture;?>" alt="pas d\'avatar" />
			<p id="mini_profil_username"><?php echo $username; ?><p>
		</div>
		<div id="mini_profil_links">
			<a href="./ari.php?page=logout&amp;location=<?php echo toValidURL($_SERVER['REQUEST_URI']);?>"><br>logout</a>
			<a href="./ari.php?page=profil&amp;action=read&amp;m=<?php echo $id;?>">voir son profil</a>
			<a href="./ari.php?page=profil&amp;action=write&amp;m=<?php echo $id;?>">modifier</a>
		</div>
	</div>
	<?php
}
	