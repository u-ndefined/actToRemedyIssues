<div id="page_content">	
	<?php

	switch ($action) {
		case 'read':
		foreach ($PMs as $key => $PM) {
			?>
			<div class="PM">
				<p>de: <?php echo $PM['member_username'];?></p>
				<p>titre: <?php echo $PM['PM_title'];?></p>
				<p>message: <?php echo truncate($PM['PM_content'], 20);?></p>
				<a href="ari.php?page=mailbox&amp;action=delete&amp;PM_id=<?php echo $PM['PM_id'];?>">supprimer</a>
				<a href="ari.php?page=mailbox&amp;action=new&amp;previousPM_id=<?php echo $PM['PM_id'];?>">répondre</a>
			</div>
			<?php
		}
			break;

		case 'new':
		
		if(isset($i) && $i>0){
		echo'<h1>échoué</h1>';

    	echo'<p>Une ou plusieurs erreurs se sont produites pendant le post</p>';

    	echo'<p>'.$i.' erreur(s)</p>';

    	echo'<p>'.$title_error.'</p>';

    	echo'<p>'.$recipient_error.'</p>';

    	echo'<p>'.$recipientNotFound_error.'</p>';
		}
		?>
			<form method="post" action="ari.php?page=mailbox&amp;action=new" enctype="multipart/form-data">
				<fieldset><legend><?php echo $new_title;?></legend>
					<label for='recipient'>Destinataire: </label>
					<input name="recipient" type="text" value="<?php echo $recipient;?>"/>
					<label for='title'>Titre: </label>
					<input name="title" type="text" value="<?php if($previousPM != null) echo 'Re: '.$previousPM['PM_title'];?>"/>
					<label for='recipient'>Message: </label>
					<textarea cols="80" rows="8" name="content"><?php echo '[i]message précédent: '.$previousPM['PM_content'].'[/i]';?></textarea>
					<input type="submit" name="submit" value="envoyer" />
				</fieldset>
			</form>
		<?php	
			break;

		case 'delete':
		?>
			<form method="post" action="<?php toValidURL($_SERVER['REQUEST_URI']);?>" enctype="multipart/form-data">
				<p>Voulez vous vraiment supprimer ce message ?</p>
				<input type="hidden" id="delete" name="delete" value="delete" />
				<input type="submit" name="submit" value="confirmer" />
			</form>
			<a href="ari.php?page=mailbox&amp;action=read"><input type="submit" name="submit" value="annuler" /></a>
		<?php
			break;
		
		default:
			# code...
			break;
	}

	?>
	<a href="./ari.php?page=mailbox&amp;action=read&amp;query=received">messages reçus</a>
	<a href="./ari.php?page=mailbox&amp;action=read&amp;query=sent">messages envoyés</a>
	<a href="./ari.php?page=mailbox&amp;action=new">nouveau message</a>
</div>

</body>
</html>