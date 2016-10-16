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
<script type="text/javascript" src="javascript/smoothScrolling.js"></script>

</body>
</html>