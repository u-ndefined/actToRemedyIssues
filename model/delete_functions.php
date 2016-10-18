<?php

function delete_act($actID){
	global $db;

	$query=$db->prepare('DELETE FROM act

        WHERE act_id = :actID');

        $query->bindValue(':actID',$actID,PDO::PARAM_INT);

        $query->execute();
}

function delete_remedy($remedyID){
	global $db;

	$query=$db->prepare('DELETE FROM remedy

        WHERE remedy_id = :remedyID');

        $query->bindValue(':remedyID',$remedyID,PDO::PARAM_INT);

        $query->execute();
}

function delete_issue($issueID){
	global $db;

	$query=$db->prepare('DELETE FROM issue

        WHERE issue_id = :issueID');

        $query->bindValue(':issueID',$issueID,PDO::PARAM_INT);

        $query->execute();
}

function delete_PM($PM_id){
        global $db;

        $query=$db->prepare('DELETE FROM privateMessage

        WHERE PM_id = :PM_id');

        $query->bindValue(':PM_id',$PM_id,PDO::PARAM_INT);

        $query->execute();
}