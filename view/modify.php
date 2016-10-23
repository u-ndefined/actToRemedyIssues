<div id="page_content">

<?php

if(isset($i) && $i>0){
	echo'<h1>Modification échouée</h1>';

    	echo'<p>Une ou plusieurs erreurs se sont produites pendant le post</p>';

    	echo'<p>'.$i.' erreur(s)</p>';

    	echo'<p>'.$title_error.'</p>';

    	echo'<p>'.$content_error.'</p>';
}
?>

<script type="text/javascript" src="javascript/bbcode.js"></script>
<h1>Modifier</h1>
<form method="post" action="<?php echo $here;?>" enctype="multipart/form-data">

<?php require_once('view/bbcodeTools.php'); ?>

<fieldset><legend>contexte</legend>
<?php
	if(isset($section)) {
		if(isset($issue)) {
			?>
			<p>Section: <?php echo $section['section_name'];?></p>
			<?php
			if(isset($remedy)) {
				?>
				<p>Titre solution: <?php echo $issue['issue_title'];?></p>
				<p><?php echo $issue['issue_content'];?></p>
				<p><?php echo $issue['issue_sources'];?></p>
				<?php
				if(isset($act)) {
					?>
					<p>Titre solution: <?php echo $remedy['remedy_title'];?></p>
					<p><?php echo $remedy['remedy_content'];?></p>
					<p><?php echo $remedy['remedy_sources'];?></p>

					</fieldset>

					<fieldset><legend>Votre action</legend>
					<?php
					if(checkAuthorisation(ADMIN)) {
						?>
						<label for='act_remedyID'>Remedy ID: </label>
						<input name="act_remedyID" type="text" id="act_remedyID" value="<?php echo $act['act_remedyID'];?>"/>
						<?php
					}
					else{
						?>
						<input name="act_remedyID" type="hidden" id="act_remedyID" value="<?php echo $act['act_remedyID'];?>"/>
						<?php
					}
					?>
					<input type="hidden" id="type" name="type" value="1" />
					<label for='actTitle'>Titre de l'action: </label>
					<input onclick="selectTextarea(this.id);" name="actTitle" type="text" id="actTitle" value="<?php echo $act['act_title'];?>"/>
					<br />
					<label for='actContent'>Contenu: </label>
					<textarea onclick="selectTextarea(this.id);" cols="80" rows="8" id="actContent" name="actContent"><?php echo $act['act_content'];?></textarea>
					<br />
					<?php
				}
				else{
				?>
					</fieldset>
					<fieldset><legend>Votre solution</legend>
					<?php
					if(checkAuthorisation(ADMIN)) {
						?>
						<label for='remedy_issueID'>Issue ID: </label>
						<input name="remedy_issueID" type="text" id="remedy_issueID" value="<?php echo $remedy['remedy_issueID'];?>"/>
						<?php
					}
					else{
						?>
						<input name="remedy_issueID" type="hidden" id="remedy_issueID" value="<?php echo $remedy['remedy_issueID'];?>"/>
						<?php
					}
					?>
					<input type="hidden" id="type" name="type" value="2" />
					<label for='remedyTitle'>Titre de la solution: </label>
					<input onclick="selectTextarea(this.id);" name="remedyTitle" type="text" id="remedyTitle" value="<?php echo $remedy['remedy_title'];?>"/>
					<br />
					<label for='remedyContent'>Contenu: </label>
					<textarea onclick="selectTextarea(this.id);" cols="80" rows="8" id="remedyContent" name="remedyContent"><?php echo $remedy['remedy_content'];?></textarea>
					<br />
					<label for='remedySources'>Sources: </label>
					<textarea onclick="selectTextarea(this.id);" cols="80" rows="8" id="remedySources" name="remedySources"><?php echo $remedy['remedy_sources'];?></textarea>
					<br />
				<?php
				}	
			}
			else {
				?>
				</fieldset>
				<fieldset><legend>Votre problème</legend>
				<?php
					if(checkAuthorisation(ADMIN)) {
						?>
						<label for='issue_sectionID'>Section ID: </label>
						<input name="issue_sectionID" type="text" id="issue_sectionID" value="<?php echo $issue['issue_sectionID'];?>"/>
						<?php
					}
					else{
						?>
						<input name="issue_sectionID" type="hidden" id="issue_sectionID" value="<?php echo $issue['issue_sectionID'];?>"/>
						<?php
					}
				?>
				<input type="hidden" id="type" name="type" value="3" />
				<label for='issueTitle'>Titre du problème: </label>
				<input onclick="selectTextarea(this.id);" name="issueTitle" type="text" id="issueTitle" value="<?php echo $issue['issue_title'];?>" />
				<br />
				<label for='issueContent'>Contenu: </label>
				<textarea onclick="selectTextarea(this.id);" cols="80" rows="8" id="issueContent" name="issueContent"><?php echo $issue['issue_content'];?></textarea>
				<br />
				<label for='issueSources'>Sources: </label>
				<textarea onclick="selectTextarea(this.id);" cols="80" rows="8" id="issueSources" name="issueSources"><?php echo $issue['issue_sources'];?></textarea>
				</fieldset>
				<?php
			}
		}
	}
	?>
	<input type="submit" name="submit" value="submit" />
	</form>
</div>
	</body>
</html>