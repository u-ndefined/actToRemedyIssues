<div id="page_content">	
	<form method="post" action="<?php echo $here;?>" enctype="multipart/form-data">
	<p>Voulez vous vraiment supprimer votre 
	<?php
	if(isset($act)){
		echo 'action?';
		echo '<input type="hidden" id="type" name="type" value="1" />';
	}
	else if(isset($remedy)){
		echo 'solution?';
		echo '<input type="hidden" id="type" name="type" value="2" />';
	}
	else {
		echo 'problème?';
		echo '<input type="hidden" id="type" name="type" value="3" />';
	}
	?>
	</p>
		<input type="submit" name="submit" value="confirmer" />
	</form>
	<a href="ari.php?page=section&amp;s=<?php echo $sectionID;?>"><input type="submit" name="submit" value="annuler" /></a>
</div>
</body>
</html>