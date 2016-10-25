<div id="page_content">	
<form class="form_postButton_remedy" method="post" action="ari.php?page=post&amp;s=<?php echo $s;?>" enctype="multipart/form-data">
	<input class="postButton postAct" type="submit" name="addIssue" value="add" />
</form>
<div class="aris">
<?php
if(isset($issues)){
	?>
			<?php
			foreach ($issues as $key => $issue){
				?>
				<div class="ari">
				<div class="issue box">
					<p class="issue_title"><?php echo $issue['issue_title'];?></p>
					<p class="issue_content"><?php echo $issue['issue_content'];?></p>
					<?php
				if($id == $issue['issue_authorID'] || checkAuthorisation(MODERATOR)){
				?>
					<form class="form_modifyButton_issue" method="post" action="ari.php?page=modify&amp;s=<?php echo $issue['issue_sectionID'];?>&amp;i=<?php echo $issue['issue_id'];?>" enctype="multipart/form-data">
						<input class="modifyButton modifyIssue" type="submit" name="modifyIssue" value="modifier" />
					</form>
					<form class="form_deleteButton_issue" method="post" action="ari.php?page=delete&amp;s=<?php echo $issue['issue_sectionID'];?>&amp;i=<?php echo $issue['issue_id'];?>" enctype="multipart/form-data">
						<input class="deleteButton deleteIssue" type="submit" name="deleteIssue" value="supprimer" />
					</form>
				<?php
				}
				?>
				<p>Urgency: <?php echo $issue['issue_urgency']?>
				<a href="ari.php?page=vote&amp;vote=1&amp;type=issue&amp;id=<?php echo $issue['issue_id'];?>&amp;s=<?php echo $issue['issue_sectionID'];?>">up vote</a>
				<a href="ari.php?page=vote&amp;vote=-1&amp;type=issue&amp;id=<?php echo $issue['issue_id'];?>&amp;s=<?php echo $issue['issue_sectionID'];?>">down vote</a>
				</p>
				
				<a href="ari.php?page=comment&amp;action=read&amp;type=issue&amp;subjectID=<?php echo $issue['issue_id'];?>">commentaires</a>
				</div>
				
				
				<div id="remedies<?php echo $key;?>" class="remedies" onscroll="stopScrolling(this.id)">
				<form class="form_postButton_remedy" method="post" action="ari.php?page=post&amp;s=<?php echo $issue['issue_sectionID'];?>&amp;i=<?php echo $issue['issue_id'];?>" enctype="multipart/form-data">
						<input class="postButton postRemedy" type="submit" name="addRemedy" value="add" />
				</form>
				<?php
				foreach ($remedies[$key] as $key2 => $remedy) {
					?>
					<div class="remedy box">
						<p class="remedy_title"><?php echo $remedy['remedy_title'];?></p>
						<p class="remedy_content"><?php echo $remedy['remedy_content'];?></p>
						<?php
					if($id == $issue['issue_authorID'] || checkAuthorisation(MODERATOR)){
					?>
						<form class="form_modifyButton_remedy" method="post" action="ari.php?page=modify&amp;s=<?php echo $issue['issue_sectionID'];?>&amp;i=<?php echo $issue['issue_id'];?>&amp;r=<?php echo $remedy['remedy_id'];?>" enctype="multipart/form-data">
							<input class="modifyButton modifyRemedy" type="submit" name="modifyRemedy" value="modifier" />
						</form>
						<form class="form_deleteButton_remedy" method="post" action="ari.php?page=delete&amp;s=<?php echo $issue['issue_sectionID'];?>&amp;i=<?php echo $issue['issue_id'];?>&amp;r=<?php echo $remedy['remedy_id'];?>" enctype="multipart/form-data">
							<input class="deleteButton deleteRemedy" type="submit" name="deleteRemedy" value="supprimer" />
						</form>
					<?php
					}
					?>
					<p>Urgency: <?php echo $remedy['remedy_relevence']?>
				<a href="ari.php?page=vote&amp;vote=1&amp;type=remedy&amp;id=<?php echo $remedy['remedy_id'];?>&amp;s=<?php echo $issue['issue_sectionID'];?>">up vote</a>
				<a href="ari.php?page=vote&amp;vote=-1&amp;type=remedy&amp;id=<?php echo $remedy['remedy_id'];?>&amp;s=<?php echo $issue['issue_sectionID'];?>">down vote</a>
				</p>
					<a href="ari.php?page=comment&amp;action=read&amp;type=remedy&amp;subjectID=<?php echo $remedy['remedy_id'];?>">commentaires</a>
					</div>

					
				
				<div id="acts<?php echo $key;?>_acts<?php echo $key2;?>" class="acts" style="top:<?php echo $key2*300;?>px;" onscroll="stopScrolling(this.id)">
				<form class="form_postButton_act" method="post" action="ari.php?page=post&amp;s=<?php echo $issue['issue_sectionID'];?>&amp;i=<?php echo $issue['issue_id'];?>&amp;r=<?php echo $remedy['remedy_id'];?>" enctype="multipart/form-data">
							<input class="postButton postAct" type="submit" name="addAct" value="add" />
						</form>
					<?php
					foreach ($acts[$key][$key2] as $key3 => $act) {
						?>
						<div class="act box" onclick="stop();">
							<p class="act_title"><?php echo $act['act_title'];?></p>
							<p class="act_content"><?php echo $act['act_content'];?></p>
							<?php
						if($id == $issue['issue_authorID'] || checkAuthorisation(MODERATOR)){
						?>
							<form class="form_modifyButton_act" method="post" action="ari.php?page=modify&amp;s=<?php echo $issue['issue_sectionID'];?>&amp;i=<?php echo $issue['issue_id'];?>&amp;r=<?php echo $remedy['remedy_id'];?>&amp;a=<?php echo $act['act_id'];?>" enctype="multipart/form-data">
								<input class="modifyButton modifyAct" type="submit" name="modifyAct" value="modifier" />
							</form>
							<form class="form_deleteButton_act" method="post" action="ari.php?page=delete&amp;s=<?php echo $issue['issue_sectionID'];?>&amp;i=<?php echo $issue['issue_id'];?>&amp;r=<?php echo $remedy['remedy_id'];?>&amp;a=<?php echo $act['act_id'];?>" enctype="multipart/form-data">
								<input class="deleteButton deleteAct" type="submit" name="deleteAct" value="supprimer" />
							</form>
						<?php
						}
						?>
						<p>Urgency: <?php echo $act['act_feasibility']?>
				<a href="ari.php?page=vote&amp;vote=1&amp;type=act&amp;id=<?php echo $act['act_id'];?>&amp;s=<?php echo $issue['issue_sectionID'];?>">up vote</a>
				<a href="ari.php?page=vote&amp;vote=-1&amp;type=act&amp;id=<?php echo $act['act_id'];?>&amp;s=<?php echo $issue['issue_sectionID'];?>">down vote</a>
				</p>
						<a href="ari.php?page=comment&amp;action=read&amp;type=act&amp;subjectID=<?php echo $act['act_id'];?>">commentaires</a>
						</div>

						
						<?php
					}
					?>
				</div>
				<?php
			}
			?>
				</div>
				</div>
				<?php
		}
		
}
?>
</div>
</div>
<script type="text/javascript" src="javascript/smoothScrolling.js"></script>

</body>
</html>