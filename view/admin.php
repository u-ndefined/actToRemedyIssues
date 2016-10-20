<div id="page_content">	
	<?php
	if(isset($i) && $i>0){

		echo'<p>Une ou plusieurs erreurs se sont produites pendant l\'incription</p>';

		echo'<p>'.$i.' erreur(s)</p>';

		echo'<p>'.$username_error1.'</p>';

		echo'<p>'.$username_error2.'</p>';

		echo'<p>'.$password_error.'</p>';

		echo'<p>'.$rank_error.'</p>';

		echo'<p>'.$title_error.'</p>';

		echo'<p>'.$content_error.'</p>';

	}
	switch ($query) {
		case 'members':
		switch ($action) {
			case 'edit':
			?>
			<form method="post" action="ari.php?page=admin&amp;query=members&amp;action=edit&amp;id=<?php echo $member['member_id'];?>" enctype="multipart/form-data">
				<fieldset><legend>Modifier membre</legend>
				<label for='username'>Username: </label>
				<input id="username" name="username" type="text" value="<?php echo $member['member_username'];?>"/>
				<label for="password">New password :</label>
				<input type="password" name="password" id="password" /><br />
				<label for="confirm">Confirm passsword :</label>
				<input type="password" name="confirm" id="confirm" />
				<p>Email: <?php echo $member['member_email'];?></p>
				<img src="./images/avatars/<?php echo $member['member_picture'];?>" alt="pas d'avatar" />
				<label><input type="checkbox" name="delete" value="Delete" />Delete picture</label>
				<label for='rank'>Rank: </label>
				<select name="rank">
					<option value="0" <?php if($member['member_rank']==0)echo 'selected';?>>Banished</option>
					<option value="1" <?php if($member['member_rank']==1)echo 'selected';?>>Visitor</option>
					<option value="2" <?php if($member['member_rank']==2)echo 'selected';?>>Member</option>
					<option value="3" <?php if($member['member_rank']==3)echo 'selected';?>>Moderator</option>
					<option value="4" <?php if($member['member_rank']==4)echo 'selected';?>>Admin</option>
				</select>
				<p>Sign in date: <?php echo $member['member_signinDate'];?></p>
				<input type="submit" name="submit" value="submit" />
			</form>
			<?php
			break; //edit

			case 'delete':
			?>
			<form method="post" action="ari.php?page=admin&amp;query=members&amp;action=delete&amp;id=<?php echo $member['member_id'];?>" enctype="multipart/form-data">
				<p>Êtes-vous sûr de vouloir supprimer <?php echo $member['member_username'];?> ?
					<input type="submit" name="confirm" value="confirmer" />
					<a href="ari.php?page=admin&amp;query=members"><input type="submit" value="Annuler"/></a>
				</fieldset>
				</form>

				<?php
			break; //delete

			default:
			foreach ($members as $key => $member) {
				?>
				<div class="member">
					<p><?php echo $member['member_username'];?></p>
					<img src="./images/avatars/<?php echo $member['member_picture'];?>" alt="pas d'avatar" />
					<a href="ari.php?page=admin&amp;query=members&amp;action=edit&amp;id=<?php echo $member['member_id'];?>">Edit</a>
					<a href="ari.php?page=admin&amp;query=members&amp;action=delete&amp;id=<?php echo $member['member_id'];?>">Delete</a>
				</div>
				<?php
			}
			break; //default action
			}//switch
			break; //members

			case 'configs':
			?>
			<form method="post" action="ari.php?page=admin&amp;query=configs" enctype="multipart/form-data">
				<fieldset><legend>Configs</legend>
				<?php
				foreach ($confs as $key => $conf) {
					?>
					<label for="<?php echo $conf['config_name'];?>"><?php echo $conf['config_name'];?></label>
					<input name="<?php echo $conf['config_name'];?>" type="text" value="<?php echo $conf['config_value'];?>"/>
					<?php
				}
				?>
				<input type="submit" name="submit" value="submit" />
			</fieldset>
			</form>
			<?php
			break; //config

			/*
			case 'sections':
			if(isset($sectionID_admin)){
				echo "string";
				?>
				<form method="post" action="ari.php?page=admin&amp;query=sections&amp;s=<?php echo $sectionID_admin;?>" enctype="multipart/form-data">
					<label for="<?php echo $section['section_name'];?>_name">Section name: </label>
					<input name="<?php echo $section['section_name'];?>_name" type="text" value="<?php echo $section['section_name'];?>"/>
					<div id="admin_issues">
						<?php
						foreach ($issues_admin as $key => $issue) {
							?>
							<p>ID:<?php echo $issue['issue_id'];?></p>
							<p>Title:<?php echo $issue['issue_title'];?></p>
							<label for="<?php echo $issue['issue_id'];?>_sectionID">Section ID: </label>
							<input name="<?php echo $issue['issue_id'];?>_sectionID" type="text" value="<?php echo $issue['issue_sectionID'];?>"/>
							<?php
						}
						?>
					</div>
					<div id="admin_remedies">
						<?php
						foreach ($remedies_admin as $key => $remedy) {
							?>
							<p>ID: <?php echo $remedy['remedy_id'];?></p>
							<p>Title: <?php echo $issue['remedy_title'];?></p>
							<label for="<?php echo $remedy['remedy_id'];?>_issueID">Issue ID: </label>
							<input name="<?php echo $remedy['remedy_id'];?>_issueID" type="text" value="<?php echo $remedy['remedy_issueID'];?>"/>
							<?php
						}
						?>
					</div>
					<div id="admin_acts">
						<?php
						foreach ($acts_admin as $key => $act) {
							?>
							<p>ID: <?php echo $act['act_id'];?></p>
							<p>Title: <?php echo $act['act_title'];?></p>
							<label for="<?php echo $act['act_id'];?>_remedyID">Remedy ID: </label>
							<input name="<?php echo $act['act_id'];?>_remedyID" type="text" value="<?php echo $act['act_remedyID'];?>"/>
							<?php
						}
						?>
					</div>
					<input type="submit" name="submit" value="submit" />
				</form>
				<?php
			}
			else {
				?>
				<form method="post" action="ari.php?page=admin&amp;query=sections" enctype="multipart/form-data">
					<?php
					foreach ($sections as $key => $section) {
						?>
						<p>ID:<?php echo $section['section_id'];?></p>
						<a href="ari.php?page=admin&amp;query=section&amp;s=<?php echo $section['section_id'];?>"><?php echo $section['section_name'];?></a>
						<label for="<?php echo $section['section_name'];?>_order">Order: </label>
						<input name="<?php echo $section['section_name'];?>_order" type="text" value="<?php echo $section['section_order'];?>"/>
						<?php
					}
					?>
					<input type="submit" name="submit" value="submit" />
				</form>
				<?php
			}
			break;//break section

			*/
			case 'news':
			?>
				<form method="post" action="ari.php?page=admin&amp;query=news" enctype="multipart/form-data">
					<fieldset><legend>Nouvelle news</legend>
						<label for="title">Title</label>
						<input name="title" type="text"/>
						<label for="content">Content</label>
						<textarea name="content"></textarea>
						<input type="submit" name="submit" value="submit" />
					</fieldset>
				</form>
				<?php
				break;

			case 'intro':
				?>
				<form method="post" action="ari.php?page=admin&amp;query=intro" enctype="multipart/form-data">
					<fieldset><legend>Nouvelle intro</legend>
						<label for="title">Title</label>
						<input name="title" type="text"/>
						<label for="content">Content</label>
						<textarea name="content"></textarea>
						<input type="submit" name="submit" value="submit" />
					</fieldset>
				</form>
				<?php
				break;

			default:
			?>
			<a href="ari.php?page=admin&amp;query=members">membres</a>
			<a href="ari.php?page=admin&amp;query=sections">sections</a>
			<a href="ari.php?page=admin&amp;query=configs">configs</a>
			<a href="ari.php?page=admin&amp;query=news">news</a>
			<a href="ari.php?page=admin&amp;query=intro">intro</a>
			<?php
			break;//default query
			}//switch query
			?>
		</div>

	</body>
	</html>