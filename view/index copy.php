<?php
$titre = "index";
require_once("includes/first_html.php");
?>

	<h2>Sections</h2>

	<?php
	foreach ($sections as $key => $section) {
		?>
		<a href="ari.php?section=<?php echo $sections[$key]['section_id']; ?>"><?php echo $section['section_name']; ?></a>

		<form method="post" action="ari.php?page=post&amp;s=<?php echo $section['section_id'];?>" enctype="multipart/form-data">
		<input type="submit" name="add" value="ad" />
		</form>
		<br />
		<?php	
	}
	if(isset($issues)){

		foreach ($issues as $key => $issue){
			?>

			<h3><?php echo $issue['issue_title'];?></h3>
			<p><?php echo $issue['issue_content'];?></p>

			<form method="post" action="ari.php?page=post&amp;s=<?php echo $issue['issue_sectionID'];?>&amp;i=<?php echo $issue['issue_id'];?>" enctype="multipart/form-data">
			<input type="submit" name="add" value="ad" />
			</form>

			<?php
			foreach ($remedies[$key] as $key2 => $remedy) {
				?>

				<h4><?php echo $remedy['remedy_title'];?></h4>
				<p><?php echo $remedy['remedy_content'];?></p>
				
				<form method="post" action="ari.php?page=post&amp;s=<?php echo $issue['issue_sectionID'];?>&amp;i=<?php echo $issue['issue_id'];?>&amp;r=<?php echo $remedy['remedy_id'];?>" enctype="multipart/form-data">
				<input type="submit" name="add" value="ad" />
				</form>

				<?php
				foreach ($acts[$key][$key2] as $key3 => $act) {
					?>
					<h5><?php echo $act['act_title'];?></h5>
					<p><?php echo $act['act_content'];?></p>

					<?php
				}
			}
		}
	}
	?>
</body>
</html>