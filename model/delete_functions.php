<?php

function delete_news($newsID){
        global $db;

        $query=$db->prepare('DELETE FROM news

        WHERE news_id = :newsID');

        $query->bindValue(':newsID',$newsID,PDO::PARAM_INT);

        $query->execute();
}

function delete_intro($introID){
        global $db;

        $query=$db->prepare('DELETE FROM intro

        WHERE intro_id = :introID');

        $query->bindValue(':introID',$introID,PDO::PARAM_INT);

        $query->execute();
}

function delete_member($memberID){
        global $db;

        $query=$db->prepare('DELETE FROM member

        WHERE member_id = :memberID');

        $query->bindValue(':memberID',$memberID,PDO::PARAM_INT);

        $query->execute();
}

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