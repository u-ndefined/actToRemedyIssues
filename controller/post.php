<?php

// $action = (isset($_GET['action']))?htmlspecialchars($_GET['action']):'';

if ($id==0) error(ERR_IS_NOT_CO);

if (isset ($_GET['s'])){
	$sectionID = (int) $_GET['s'];
	$section = get_section($sectionID);
	$here = 'ari.php?page=post&s='.$sectionID;

	if (isset ($_GET['i'])){
		$issueID = (int) $_GET['i'];
		$issue = get_issue($issueID);
		$here = 'ari.php?page=post&s='.$sectionID.'&i='.$issueID;

		if (isset ($_GET['r'])){
			$remedyID = (int) $_GET['r'];
			$remedy = get_remedy($remedyID);
			$here = 'ari.php?page=post&s='.$sectionID.'&i='.$issueID.'&r='.$remedyID;
		}
	}
}



if(isset($_POST['type'])){
	$type = (int) $_POST['type'];
	$actTitle_error = NULL;
	$remedyTitle_error = NULL;
	$issueTitle_error = NULL;
	$actContent_error = NULL;
	$remedyContent_error = NULL;
	$issueContent_error = NULL;

	$i = 0;
	$date = date('Y-m-d H:i:s');

	if($type > 0){
		if($type > 1){
			if($type > 2){
				if (empty($_POST['issueTitle'])){
					$i++;
					$issueTitle_error = 'Il manque du contenu dans votre problème';
				}
				else $issueTitle = htmlspecialchars($_POST['issueTitle']);
				if (empty($_POST['issueContent'])){
					$i++;
					$issueContent_error = 'Il manque du contenu dans votre problème';
				}
				else $issueContent = htmlspecialchars($_POST['issueContent']);
			}
			if(!empty($_POST['remedyTitle']) ){
				$remedyTitle = htmlspecialchars($_POST['remedyTitle']);
				if (empty($_POST['remedyContent'])){
					$i++;
					$remedyContent_error = 'Il manque du contenu dans votre solution';
				}
				else $remedyContent = htmlspecialchars($_POST['remedyContent']);
			}
			else {
				if($type<3){
					$i++;
					$remedyTitle_error = 'Il manque un titre à votre solution';
				}
			}
		}

		if(!empty($_POST['actTitle']) ){
				$actTitle = htmlspecialchars($_POST['actTitle']);
				if (empty($_POST['actContent'])){
					$i++;
					$actContent_error = 'Il manque du contenu dans votre action';
				}
				else $actContent = htmlspecialchars($_POST['actContent']);
			}
			else {
				if($type<2){
					$i++;
					$actTitle_error = 'Il manque un titre à votre action';
				}
			}
	}

	else {
		$i++;
		$title_error = 'Il manque un titre';
	}

	if($i==0){
		if($type > 2){
			$issueSources = (empty($_POST['issueSources'])?'':htmlspecialchars($_POST['issueSources']));
			set_issue($issueTitle, $issueContent, $issueSources, $id, $date, $sectionID);
			$issueID = get_IDbyTitle('issue', $issueTitle);
		}
		if($type > 1 && isset($remedyTitle)){
			$remedySources = (empty($_POST['remedySources'])?'':htmlspecialchars($_POST['remedySources']));
			set_remedy($remedyTitle, $remedyContent, $remedySources, $id, $date, $issueID);
			$remedyID = get_IDbyTitle('remedy', $remedyTitle);
		}
		if($type > 0 && isset($actTitle)) set_act($actTitle, $actContent, $id, $date, $remedyID);

		header('Location:ari.php?section='.$sectionID);
	}
	
}