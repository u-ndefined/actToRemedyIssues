<div id="page_content">
	<div id="intro">
		<h2><?php echo $intro['intro_title']?></h2>
		<p><?php echo $intro['intro_content']?></p>
		<?php
			if (checkAuthorisation(ADMIN)&& !empty($intro['intro_title'])) {
			?>
				<a href="./ari.php?page=modify_index&amp;type=intro&amp;id=<?php echo $intro['intro_id']?>">modifier/supprimer</a>
			<?php
			}
			?>
	</div>
	<div id="news">
		<?php
		foreach ($news as $key => $new) {
			?>
			<div class"news">
				<h2><?php echo $new['news_title'];?></h2>
				<p><?php echo $new['news_content'];?></p>
				<?php
				if (checkAuthorisation(ADMIN)) {
				?>
					<a href="./ari.php?page=modify_index&amp;type=news&amp;id=<?php echo $new['news_id']?>">modifier/supprimer</a>
				<?php
				}
				?>
			</div>
			<?php
		}
		?>
	</div>
</div>

</body>
</html>