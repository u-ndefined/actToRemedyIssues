<div id="page_content">

<?php

if(isset($i) && $i>0){
	echo'<h1>Modification échouée</h1>';

    	echo'<p>Une ou plusieurs erreurs se sont produites pendant le post</p>';

    	echo'<p>'.$i.' erreur(s)</p>';

    	echo'<p>'.$title_error.'</p>';

    	echo'<p>'.$content_error.'</p>';
}
if(isset($_GET['delete'])){
	?>
	<form method="post" action="ari.php?page=modify_index&amp;type=<?php echo $type;?>&amp;id=<?php echo $this_id;?>&amp;delete=delete" enctype="multipart/form-data">
		<p>Êtes-vous sûr de vouloir supprimer cette <?php echo $type;?> ? </p>
		<input type="submit" name="confirm" value="confirmer" />
		<a href="ari.php?page=modify_index&amp;type=<?php echo $type;?>&amp;id=<?php echo $this_id;?>"><input type="submit" value="Annuler"/></a>
	</form>

<?php
}
else{

?>

<script type="text/javascript" src="javascript/bbcode.js"></script>
<h1>Modifier</h1>
<a href="ari.php?page=modify_index&amp;type=<?php echo $type;?>&amp;id=<?php echo $this_id;?>&amp;delete=delete">supprimer</a>
<form method="post" action="ari.php?page=modify_index&amp;type=<?php echo $type;?>&amp;id=<?php echo $this_id;?>" enctype="multipart/form-data">
<?php require_once('view/bbcodeTools.php'); ?>
	<fieldset><legend>Votre action</legend>
		<label for='title'>Titre: </label>
		<input onclick="selectTextarea(this.id);" name="title" type="text" id="title" value="<?php echo $title;?>"/>
		<br />
		<label for='content'>content: </label>
		<textarea onclick="selectTextarea(this.id);" cols="80" rows="8" id="content" name="content"><?php echo $content;?></textarea>
		<br />
	</fieldset>
	<input type="submit" name="submit" value="submit" />
</form>
<?php
}
?>
</div>
</body>
</html>