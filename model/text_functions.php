<?php

function replaceCode($text){
	//gras

	$text = preg_replace('`\[b\](.+)\[/b\]`isU', '<strong>$1</strong>', $text); 

	//italique

	$text = preg_replace('`\[i\](.+)\[/i\]`isU', '<em>$1</em>', $text);

	//lien

	$text = preg_replace('`\[url\](.+)\[/url\]`isU', '<a href="$1">$1</a>', $text);

	//youtube

	// $text = preg_replace('#http?s://www.youtube.com/watch\?v=[a-z0-9._/-]+#i',

	// '<iframe width="560" height="315" src="$0" frameborder="0" allowfullscreen></iframe>', $text);

	if(ytID_from_url($text)){
		$text = preg_replace('#http?s://www.youtube.com/[a-z0-9._/-?]+#i', ytID_from_url($text), $text);

	}




	// $text = preg_replace('#http?s://[a-z0-9._/-]+#i', '<a href="$0">$0</a>', $text);

return $text;
}

function ytID_from_url($url){
	if (preg_match('/youtube\.com\/watch\?v=([^\&\?\/]+)/', $url, $ytid)) {
 	 	$values = $ytid[1];
	} else if (preg_match('/youtube\.com\/embed\/([^\&\?\/]+)/', $url, $ytid)) {
  		$values = $ytid[1];
	} else if (preg_match('/youtube\.com\/v\/([^\&\?\/]+)/', $url, $ytid)) {
  		$values = $ytid[1];
	} else if (preg_match('/youtu\.be\/([^\&\?\/]+)/', $url, $ytid)) {
  		$values = $ytid[1];
	}
	else if (preg_match('/youtube\.com\/verify_age\?next_url=\/watch%3Fv%3D([^\&\?\/]+)/', $url, $ytid)) {
    	$values = $ytid[1];
	}
	else return false;

	$replacement = '<iframe width="'.$configs['ytPlayerWidth'].'" height="'.$configs['ytPlayerHeight'].'" src=https://www.youtube.com/embed/'.$values.' frameborder="0" allowfullscreen></iframe>';

	return $replacement;
}