<div id="page_content">
<?php
if($action == 'delete'){
	?>
	<form method="post" action="ari.php?page=comment&amp;action=delete&amp;type=<?php echo $type;?>&amp;subjectID=<?php echo $subjectID;?>&amp;comID=<?php echo $comID;?>" enctype="multipart/form-data">
		<p>Êtes-vous sûr de vouloir supprimer ce commentaire ?
		<input type="submit" name="confirm" value="confirmer" />
		<a href="<php echo 'ari.php?page=comment&amp;action=read&amp;$type='.$type.'&amp;subjectID='.$subjectID.'?>"><input type="submit" value="Annuler"/></a>
	</form>
	<?php
}
else{
	if($action == 'read'){
?>
	<div id="comments">
		<?php
		foreach ($comments as $key => $com) {
			?>
			<p><?php echo $com['comment_content']?></p>
			<p><?php echo $com['comment_author']?></p>
			<p><?php echo $com['comment_postDate']?></p>
			<?php
			if($com['comment_authorID'] == $id || checkAuthorisation(MODERATOR)){
				?>
				<!-- <a href="<php echo 'ari.php?page=comment&action=modify&$type='.$type.'&subjectID='.$subjectID.'&comID='.$com['comment_id'];?>">modifier</a> -->
				<a href="ari.php?page=comment&amp;action=modify&amp;type=<?php echo $type;?>&amp;subjectID=<?php echo $subjectID;?>&amp;comID=<?php echo $com['comment_id'];?>">modifier</a>
				
				<a href="ari.php?page=comment&amp;action=delete&amp;type=<?php echo $type;?>&amp;subjectID=<?php echo $subjectID;?>&amp;comID=<?php echo $com['comment_id'];?>">supprimer</a>
				<!-- <a href="<php echo 'ari.php?page=comment&amp;action=delete&amp;$type='.$type.'&amp;subjectID='.$subjectID.'&amp;comID='.$com['comment_id'];?>">supprimer</a> -->
				<?php
			}
		}
		?>
	</div>
<?php
}
if(isset($i) && $i>0){
	echo'<h1>Post échoué</h1>';

    	echo'<p>Une ou plusieurs erreurs se sont produites pendant le post</p>';

    	echo'<p>'.$i.' erreur(s)</p>';

    	echo'<p>'.$content_error.'</p>';
}
?>
	<form method="post" action="ari.php?page=comment&amp;action=modify&amp;type=<?php echo $type;?>&amp;subjectID=<?php echo $subjectID;?>" enctype="multipart/form-data">
		<fieldset><legend>Commentaire</legend>
			<textarea name="content"><?php echo $comment['comment_content']?></textarea>
			<input type="submit" name="submit" value="submit" />
		</fieldset>
	</form>
<?php
}
?>
</div>
</body>
</html>