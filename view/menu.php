<ul class="menu_ul">
<?php
foreach ($sections as $key => $section) {
	?>
 		<li class="menu_li_section">
 			<a class="menu_a_section" href="ari.php?page=section&amp;s=<?php echo $sections[$key]['section_id']; ?>"><?php echo $section['section_name']; ?></a>
 		</li>
<?php	
}
?>
	<li class="menu_li_post">
 		<a class="menu_a_post" href="ari.php?page=post">Poster</a>
 	</li>
</ul>