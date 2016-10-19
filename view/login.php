<div id="page_content">
<form method="post" action="ari.php?page=login">
	<fieldset>
		<legend>Log in</legend>
		<?php if(isset($message)) echo '<p>'.$message.'</p>'; ?>
		<p>
			<label for="username">username :</label><input name="username" type="text" id="username" /><br />
			<label for="password">password :</label><input type="password" name="password" id="password" />
		</p>
		<!-- <label>Se souvenir de moi ?</label><input type="checkbox" name="rememberMe" /><br /> -->
	</fieldset>
	<input type="hidden" name="location" value="<?php if(isset($_GET['location'])) echo htmlspecialchars($_GET['location']);?>"/>
	<p><input type="submit" value="login" /></p></form>
	<a href="./ari.php?page=register">register?</a>
</div>

</body>
</html>