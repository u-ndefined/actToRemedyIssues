<?php
$news = get_news();
$intro = get_intro();

foreach ($news as $key => $new) {
	$news[$key]['news_title'] = replaceCode(htmlspecialchars($new['news_title']));
	$news[$key]['news_content'] = replaceCode(htmlspecialchars($new['news_content']));
}

$intro['intro_title'] = replaceCode(htmlspecialchars($intro['intro_title']));
$intro['intro_content'] = replaceCode(htmlspecialchars($intro['intro_content']));