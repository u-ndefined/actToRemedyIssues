<div id="page_content">	
<?php

if(isset($_GET['posted'])) echo 'Posted correctly';
if(isset($i) && $i>0){
	echo'<h1>Post échoué</h1>';

    	echo'<p>Une ou plusieurs erreurs se sont produites pendant le post</p>';

    	echo'<p>'.$i.' erreur(s)</p>';

    	echo'<p>'.$issueTitle_error.'</p>';

    	echo'<p>'.$remedyTitle_error.'</p>';

    	echo'<p>'.$actTitle_error.'</p>';

    	echo'<p>'.$issueContent_error.'</p>';

    	echo'<p>'.$remedyContent_error.'</p>';

    	echo'<p>'.$actContent_error.'</p>';
}
?>

<script type="text/javascript" src="javascript/bbcode.js"></script>
<h1>Poster</h1>
<form method="post" action="<?php echo $here;?>" enctype="multipart/form-data">

<?php require_once('view/bbcodeTools.php'); ?>

<fieldset><legend>contexte</legend>
	<?php
	if(isset($section)) {
		echo 'Section: '.$section['section_name'];
		?> <input type="hidden" id="type" name="type" value="1" /> <?php
		if(!isset($remedy)){
			?> <input type="hidden" id="type" name="type" value="2" /> <?php
			if(!isset($issue)){
	?>
				<input type="hidden" id="type" name="type" value= "3" />

					</fieldset>
					<fieldset><legend>Votre problème</legend>
					<label for='issueTitle'>Titre du problème: </label>
					<input onclick="selectTextarea(this.id);" id="issueTitle" name="issueTitle" type="text"/>
					<br />
					<label for='issueContent'>Contenu: </label>
					<textarea onclick="selectTextarea(this.id);" cols="80" rows="8" id="issueContent" name="issueContent"></textarea>
					<br />
					<label for='issueSources'>Sources: </label>
					<textarea onclick="selectTextarea(this.id);" cols="80" rows="8" id="issueSources" name="issueSources"></textarea>
					<br />
				<?php
				}
				else {
					echo '<br /><br />problèmes: '.$issue['issue_title'];
					echo '<br />'.$issue['issue_content'];
				}
				?>
				</fieldset>
				<fieldset><legend>Votre solution</legend>
				<label for='remedyTitle'>Titre de la solution: </label>
				<input onclick="selectTextarea(this.id);" name="remedyTitle" type="text" id="remedyTitle" />
				<br />
				<label for='remedyContent'>Contenu: </label>
				<textarea onclick="selectTextarea(this.id);" cols="80" rows="8" id="remedyContent" name="remedyContent"></textarea>
				<br />
				<label for='remedySources'>Sources: </label>
				<textarea onclick="selectTextarea(this.id);" cols="80" rows="8" id="remedySources" name="remedySources"></textarea>
				<br />
		<?php
		}
		else {
			echo '<br /><br />problèmes: '.$issue['issue_title'];
			echo '<br />'.$issue['issue_content'];
			echo '<br /><br />Solution: '.$remedy['remedy_title'];
			echo '<br />'.$remedy['remedy_content'];
		}
		?>
		</fieldset>
		<fieldset><legend>Votre action</legend>
		<label for='actTitle'>Titre de l'action: </label>
		<input onclick="selectTextarea(this.id);" name="actTitle" type="text" id="actTitle" />
		<br />
		<label for='actContent'>Contenu: </label>
		<textarea onclick="selectTextarea(this.id);" cols="80" rows="8" id="actContent" name="actContent"></textarea>

		</fieldset>
		<input type="submit" name="submit" value="submit" />
	</form>
</div>

		</body>

		</html>
	<?php
	}
	