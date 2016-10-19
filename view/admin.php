<div id="page_content">	
	<?php
	if(isset($i) && $i>0){

    	echo'<p>Une ou plusieurs erreurs se sont produites pendant l incription</p>';

    	echo'<p>'.$i.' erreur(s)</p>';

    	echo'<p>'.$username_error1.'</p>';

    	echo'<p>'.$username_error2.'</p>';

    	echo'<p>'.$password_error.'</p>';

    	echo'<p>'.$rank_error.'</p>';

    	echo $password.'-0000000-'.$confirm;

	}
	switch ($query) {
		case 'members':
			switch ($action) {
				case 'edit':
					?>
						<form method="post" action="ari.php?page=admin&amp;query=members&amp;action=edit&amp;id=<?php echo $member['member_id'];?>" enctype="multipart/form-data">
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
					break;

				case 'delete':
				?>
					<form method="post" action="ari.php?page=admin&amp;query=members&amp;action=delete&amp;id=<?php echo $member['member_id'];?>" enctype="multipart/form-data">
						<p>Êtes-vous sûr de vouloir supprimer <?php echo $member['member_username'];?> ?
						<input type="submit" name="confirm" value="confirmer" />
						<a href="ari.php?page=admin&amp;query=members"><input type="submit" value="Annuler"/></a>
					</form>

				<?php
					break;
				
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
					break;
			}
			break;

		case 'configs':
			?>
			<form method="post" action="ari.php?page=admin&amp;query=configs" enctype="multipart/form-data">
			<?php
			foreach ($confs as $key => $conf) {
				?>
				<label for="<?php echo $conf['config_name'];?>"><?php echo $conf['config_name'];?></label>
				<input name="<?php echo $conf['config_name'];?>" type="text" value="<?php echo $conf['config_value'];?>"/>
				<?php
			}
			?>
			<input type="submit" name="submit" value="submit" />
			</form>
			<?php
			break;
		
		default:
			?>
				<a href="ari.php?page=admin&amp;query=members">membres</a>
				<a href="ari.php?page=admin&amp;query=sections">sections</a>
				<a href="ari.php?page=admin&amp;query=configs">configs</a>
			<?php
			break;
	}
	?>
</div>

</body>
</html>