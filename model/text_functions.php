<?php

function replaceCode($text){
	//gras

	$text = preg_replace('`\[b\](.+)\[/b\]`isU', '<strong>$1</strong>', $text); 

	//italique

	$text = preg_replace('`\[i\](.+)\[/i\]`isU', '<em>$1</em>', $text);

	//lien

	$text = preg_replace('#http?s://[a-z0-9._/-]+#i', '<a href="$0">$0</a>', $text);


return $text;
}