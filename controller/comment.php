<?php

$type = (isset($_GET['type'])?htmlspecialchars($_GET['type']):'');
$subjectID = (isset($_GET['subjectID'])?htmlspecialchars($_GET['subjectID']):'');

$action = (isset($_GET['action'])?htmlspecialchars($_GET['action']):'');

$comID = (isset($_GET['comID'])?(int) $_GET['comID']:'');

$comment = null;

switch ($action) {
	case 'read':
	if(!empty($type) && !empty($subjectID)){
		$comments = get_comments($type, $subjectID);

		foreach ($comments as $key => $com) {
			$comments[$key]['comment_content']=replaceCode(htmlspecialchars($com['comment_content']));
		}
	}
	break;

	case 'delete':
	if(!empty($comID)){
		$comment = get_comment($comID);
		if($comment['comment_authorID'] != $id && !checkAuthorisation(MODERATOR)) error(ERR_WRONG_USER);
		if(isset($_POST['confirm'])){
			delete_comment($comID);
			header('Location:ari.php?page=comment&type='.$type.'&subjectID='.$subjectID);
		}
	}
	break;

	case 'modify':
	if(!empty($comID)){
		$comment = get_comment($comID);
		if($comment['comment_authorID'] != $id && !checkAuthorisation(MODERATOR)) error(ERR_WRONG_USER);
	}
	if(isset($_POST['submit'])){
		if ($id==0) error(ERR_IS_NOT_CO);
		$i = 0;
		$date = date('Y-m-d H:i:s');
		$content_error = null;
		if(empty($_POST['content'])){
			$i++;
			$content_error = 'Il manque du contenu dans votre commentaire';
		}
		else $content = htmlspecialchars($_POST['content']);
		echo $comID;
		
		switch ($comID) {
			case empty($comID):
			set_comment($content, $id, $date, $type, $subjectID);
			echo '<br /><br /><br /><br /><br /><br />set'.$content;
			break;

			default:
			update_comment($comID, $content);
			echo '<br /><br /><br /><br /><br /><br />update'.$content;
			break;
		}
		header('Location:ari.php?page=comment&action=read&type='.$type.'&subjectID='.$subjectID);
	}
	break;
	
	default:
		# code...
	break;
}








