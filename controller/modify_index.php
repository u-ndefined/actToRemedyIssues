<?php
if(checkAuthorisation(ADMIN)){
	$type = (isset($_GET['type'])?htmlspecialchars($_GET['type']):'');
	$this_id = (isset($_GET['id'])?(int) $_GET['id']:'');
	switch ($type) {
		case 'news':
		$news=get_new($this_id);
		$title = $news['news_title'];
		$content = $news['news_content'];
		break;

		case 'intro':
		$intro=get_intro();
		$title = $intro['intro_title'];
		$content = $intro['intro_content'];
		break;
		
		default:
		error(ERR_MISS_LACK_TYPE);
		break;
	}
	if(isset($_GET['delete'])){
		if (isset($_POST['confirm'])) {
		switch ($type) {
				case 'news':
				delete_news($this_id);
				break;

				case 'intro':
				delete_intro($this_id);
				break;
			}
		header("Location:ari.php?page=index");
		}
	}
	if(isset($_POST['title'])){
		$i = 0;
		$title_error=null;
		$content_error=null;
		if(empty($_POST['title'])){
			$i++;
			$title_error = 'Il manque un titre';
		}
		else $title = htmlspecialchars($_POST['title']);
		if(empty($_POST['content'])){
			$i++;
			$content_error = 'Il manque du contenu';
		}
		else $content = htmlspecialchars($_POST['content']);
		if($i==0){
			switch ($type) {
				case 'news':
				update_news($this_id,$title,$content);
				break;

				case 'intro':
				update_intro($this_id,$title,$content);
				break;
			}
			header("Location:ari.php?page=index");
		}
	}
}
else {
	error(ERR_IS_NOT_ADMIN);
}