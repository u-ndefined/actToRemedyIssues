<ul class="menu_ul">
<?php
foreach ($sections as $key => $section) {
	?>
 		<li class="menu_li_section">
 			<a class="menu_a_section" href="ari.php?section=<?php echo $sections[$key]['section_id']; ?>"><?php echo $section['section_name']; ?></a>
 		</li>
<?php	
}
?>
	<li class="menu_li_post">
 		<a class="menu_a_post" href="ari.php?page=post">Poster</a>
 	</li>
</ul>