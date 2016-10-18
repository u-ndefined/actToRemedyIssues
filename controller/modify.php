<?php

if ($id==0) error(ERR_IS_NOT_CO);

$here = 'ari.php?page=modify';

if (isset ($_GET['s'])){
	$sectionID = (int) $_GET['s'];
	$section = get_section($sectionID);
	$here = 'ari.php?page=modify&s='.$sectionID;

	if (isset ($_GET['i'])){
		$issueID = (int) $_GET['i'];
		$issue = get_issue($issueID);
		$here = 'ari.php?page=modify&s='.$sectionID.'&i='.$issueID;

		if (isset ($_GET['r'])){
			$remedyID = (int) $_GET['r'];
			$remedy = get_remedy($remedyID);
			$here = 'ari.php?page=modify&s='.$sectionID.'&i='.$issueID.'&r='.$remedyID;

			if (isset ($_GET['a'])){

				$actID = (int) $_GET['a'];
				$act = get_act($actID);
				$here = 'ari.php?page=modify&s='.$sectionID.'&i='.$issueID.'&r='.$remedyID.'&a='.$actID;
			}
		}
	}
}

if(isset($_POST['type'])){
	$type = (int) $_POST['type'];

	$title_error = null;
	$content_error = null;
	$i = 0;
	$date = date('Y-m-d H:i:s');
	switch ($type) {
		case 1:
			if(empty($_POST['actTitle'])){
				$i++;
				$title_error = 'Il manque un titre';
			}
			else $title = htmlspecialchars($_POST['actTitle']);
			if(empty($_POST['actContent'])){
				$i++;
				$content_error = 'Il manque du contenu';
			}
			else $content = htmlspecialchars($_POST['actContent']);
			if($i == 0){
				update_act($act['act_id'], $title, $content, $date);
				header('Location:ari.php?page=section&s='.$sectionID);
			}
			break;

		case 2:
			if(empty($_POST['remedyTitle'])){
				$i++;
				$title_error = 'Il manque un titre';
			}
			else $title = htmlspecialchars($_POST['remedyTitle']);
			if(empty($_POST['remedyContent'])){
				$i++;
				$content_error = 'Il manque du contenu';
			}
			else $content = htmlspecialchars($_POST['remedyContent']);
			$sources = (empty($_POST['remedySources'])?'':htmlspecialchars($_POST['remedySources']));
			if($i == 0){
				update_remedy($remedy['remedy_id'], $title, $content, $sources, $date);
				header('Location:ari.php?page=section&s='.$sectionID);
			}
			break;

		case 3:
			if(empty($_POST['issueTitle'])){
				$i++;
				$title_error = 'Il manque un titre';
			}
			else $title = htmlspecialchars($_POST['issueTitle']);
			if(empty($_POST['issueContent'])){
				$i++;
				$content_error = 'Il manque du contenu';
			}
			else $content = htmlspecialchars($_POST['issueContent']);
			$sources = (empty($_POST['issueSources'])?'':htmlspecialchars($_POST['issueSources']));
			if($i == 0){
				update_issue($issue['issue_id'], $title, $content, $sources, $date);
				header('Location:ari.php?page=section&s='.$sectionID);
			}
			break;
		
		default:
			echo 'unknown error';
			break;
	}
}

