<?php

function newMember($username, $password, $email, $pictureName, $date){
	global $db; 

	$query=$db->prepare('INSERT INTO member (member_username, member_password, member_email, member_picture, member_signinDate, member_rank)

    	VALUES (:username, :password, :email, :pictureName, :signinDate, 2)');

    	$query->bindValue(':username', $username, PDO::PARAM_STR);

    	$query->bindValue(':password', $password, PDO::PARAM_INT);

    	$query->bindValue(':email', $email, PDO::PARAM_STR);

    	$query->bindValue(':pictureName', $pictureName, PDO::PARAM_STR);

    	$query->bindValue(':signinDate', $date, PDO::PARAM_INT);

    	$query->execute();
}

function set_issue($title, $content, $sources, $authorID, $postDate, $sectionID){
	global $db; 

	$query=$db->prepare('INSERT INTO issue (issue_title, issue_content, issue_sources, issue_authorID, issue_postDate, issue_sectionID, issue_urgency)

    	VALUES (:title, :content, :sources, :authorID, :postDate, :sectionID, 0)');

    	$query->bindValue(':title', $title, PDO::PARAM_STR);

    	$query->bindValue(':content', $content, PDO::PARAM_INT);

    	$query->bindValue(':sources', $sources, PDO::PARAM_STR);

    	$query->bindValue(':authorID', $authorID, PDO::PARAM_STR);

    	$query->bindValue(':postDate', $postDate, PDO::PARAM_INT);

    	$query->bindValue(':sectionID', $sectionID, PDO::PARAM_INT);

    	$query->execute();
}

function set_remedy($title, $content, $sources, $authorID, $postDate, $issueID){
	global $db; 

	$query=$db->prepare('INSERT INTO remedy (remedy_title, remedy_content, remedy_sources, remedy_authorID, remedy_postDate, remedy_issueID, remedy_relevence)

    	VALUES (:title, :content, :sources, :authorID, :postDate, :issueID, 0)');

    	$query->bindValue(':title', $title, PDO::PARAM_STR);

    	$query->bindValue(':content', $content, PDO::PARAM_INT);

    	$query->bindValue(':sources', $sources, PDO::PARAM_STR);

    	$query->bindValue(':authorID', $authorID, PDO::PARAM_STR);

    	$query->bindValue(':postDate', $postDate, PDO::PARAM_INT);

    	$query->bindValue(':issueID', $issueID, PDO::PARAM_INT);
    	
    	$query->execute();

}

function set_act($title, $content, $authorID, $postDate, $remedyID){
	global $db; 

	$query=$db->prepare('INSERT INTO act (act_title, act_content, act_authorID, act_postDate, act_remedyID, act_feasibility)

    	VALUES (:title, :content, :authorID, :postDate, :remedyID, 0)');

    	$query->bindValue(':title', $title, PDO::PARAM_STR);

    	$query->bindValue(':content', $content, PDO::PARAM_INT);

    	$query->bindValue(':authorID', $authorID, PDO::PARAM_STR);

    	$query->bindValue(':postDate', $postDate, PDO::PARAM_INT);

    	$query->bindValue(':remedyID', $remedyID, PDO::PARAM_INT);

    	$query->execute();

}