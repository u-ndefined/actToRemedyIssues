<?php

if ($id==0) error(ERR_IS_NOT_CO);

$here = 'ari.php?page=delete';

if (isset ($_GET['s'])){
	$sectionID = (int) $_GET['s'];
	$section = get_section($sectionID);
	$here = 'ari.php?page=delete&s='.$sectionID;

	if (isset ($_GET['i'])){
		$issueID = (int) $_GET['i'];
		$issue = get_issue($issueID);
		$here = 'ari.php?page=delete&s='.$sectionID.'&i='.$issueID;
		$authorID = $issue['issue_authorID'];

		if (isset ($_GET['r'])){
			$remedyID = (int) $_GET['r'];
			$remedy = get_remedy($remedyID);
			$here = 'ari.php?page=delete&s='.$sectionID.'&i='.$issueID.'&r='.$remedyID;
			$authorID = $remedy['remedy_authorID'];

			if (isset ($_GET['a'])){

				$actID = (int) $_GET['a'];
				$act = get_act($actID);
				$here = 'ari.php?page=delete&s='.$sectionID.'&i='.$issueID.'&r='.$remedyID.'&a='.$actID;
				$authorID = $act['act_authorID'];
			}
		}
	}
}

if($id==$authorID || checkAuthorisation(MODERATOR)){
	if(isset($_POST['type'])){
		$type=$_POST['type'];
		switch ($type) {
			case 1:
				delete_act($act['act_id']);
				break;

			case 2:
				delete_remedy($remedy['remedy_id']);
				break;

			case 3:
				delete_issue($issue['issue_id']);
				break;
			
			default:
				echo 'unknown error';
				break;
		}
		header('Location:ari.php?page=section&s='.$sectionID);
	}
}

