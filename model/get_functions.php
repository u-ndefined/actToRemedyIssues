<?php

function get_members(){
     global $db; 

    $req = $db->prepare('SELECT member_id, member_username, member_email, member_picture, member_rank, member_signinDate FROM member ORDER BY member_username');

    $req->execute();

    $members = $req->fetchAll();

    return $members;
}

function get_sections()

{

    global $db; 

    $req = $db->prepare('SELECT section_id, section_name FROM section ORDER BY section_order');

    $req->execute();

    $sections = $req->fetchAll();

    return $sections;

}

function get_issues($sectionID)

{

    global $db; 

    $req = $db->prepare('SELECT issue_id, issue_title, issue_content, issue_sectionID, issue_authorID FROM issue WHERE issue_sectionID = :sectionID ORDER BY issue_urgency DESC');

    $req->bindParam(':sectionID', $sectionID, PDO::PARAM_INT);

    $req->execute();

    $issues = $req->fetchAll();

    return $issues;

}

function get_remedies($issueID)

{

    global $db; 

    $req = $db->prepare('SELECT remedy_id, remedy_title, remedy_content, remedy_authorID FROM remedy WHERE remedy_issueID = :issueID ORDER BY remedy_relevence DESC');

    $req->bindParam(':issueID', $issueID, PDO::PARAM_INT);

    $req->execute();

    $remedies = $req->fetchAll();

    return $remedies;

}

function get_acts($remedyID)

{

    global $db; 

    $req = $db->prepare('SELECT act_id, act_title, act_content, act_authorID FROM act WHERE act_remedyID = :remedyID ORDER BY act_feasibility DESC');

    $req->bindParam(':remedyID', $remedyID, PDO::PARAM_INT);

    $req->execute();

    $acts = $req->fetchAll();

    return $acts;

}

function alreadyTaken($field, $value)

{

	global $db; 

	switch ($field) {
		case 'username':
			$query=$db->prepare('SELECT COUNT(*) AS nbr FROM member WHERE member_username = :value');
			break;
		
		case 'email':
			$query=$db->prepare('SELECT COUNT(*) AS nbr FROM member WHERE member_email = :value');
			break;

		default:
			echo 'unknown error! Bravo!';
			break;
	}

	$query->bindValue(':value',$value, PDO::PARAM_STR);

	$query->execute();

	$alreadyTaken=($query->fetchColumn()==0)?False:True;

	return $alreadyTaken;
}

function findMember($member_username){
    global $db; 

    $query=$db->prepare('SELECT COUNT(*) AS nbr FROM member WHERE member_username = :member_username');

    $query->bindValue(':member_username',$member_username, PDO::PARAM_STR);

    $query->execute();

    $memberFound=($query->fetchColumn()==0)?False:True;

    return $memberFound;
}

function get_memberByName($username)

{

    global $db; 

    $req = $db->prepare('SELECT member_id, member_username, member_password, member_email, member_picture, member_rank, member_signinDate
    	FROM member WHERE member_username = :username');

    $req->bindParam(':username', $username, PDO::PARAM_INT);

    $req->execute();

    $member = $req->fetch();

    return $member;

}

function get_memberByID($userID)

{

    global $db; 

    $req = $db->prepare('SELECT member_id, member_username, member_password, member_email, member_picture, member_rank, member_signinDate
    	FROM member WHERE member_id = :userID');

    $req->bindParam(':userID', $userID, PDO::PARAM_INT);

    $req->execute();

    $member = $req->fetch();

    return $member;

}

function get_section($sectionID)

{

    global $db; 

    $req = $db->prepare('SELECT section_id, section_name FROM section WHERE section_id = :sectionID');

    $req->bindParam(':sectionID', $sectionID, PDO::PARAM_INT);

    $req->execute();

    $section = $req->fetch();

    return $section;

}

function get_issue($issueID)

{

    global $db; 

    $req = $db->prepare('SELECT issue_id, issue_title, issue_content, issue_sources, issue_authorID FROM issue WHERE issue_id = :issueID');

    $req->bindParam(':issueID', $issueID, PDO::PARAM_INT);

    $req->execute();

    $issue = $req->fetch();

    return $issue;

}

function get_remedy($remedyID)

{

    global $db; 

    $req = $db->prepare('SELECT remedy_id, remedy_title, remedy_content, remedy_sources, remedy_authorID FROM remedy WHERE remedy_id = :remedyID');

    $req->bindParam(':remedyID', $remedyID, PDO::PARAM_INT);

    $req->execute();

    $remedy = $req->fetch();

    return $remedy;

}

function get_act($actID)

{

    global $db; 

    $req = $db->prepare('SELECT act_id, act_title, act_content, act_authorID FROM act WHERE act_id = :actID');

    $req->bindParam(':actID', $actID, PDO::PARAM_INT);

    $req->execute();

    $act = $req->fetch();

    return $act;

}

function get_IDbyTitle($type, $title)

{

    global $db;

    switch ($type) {
         case 'act':
             $req = $db->prepare('SELECT act_id AS id FROM act WHERE act_title = :title');
             break;

         case 'remedy':
             $req = $db->prepare('SELECT remedy_id AS id FROM remedy WHERE remedy_title = :title');
             break;

         case 'issue':
             $req = $db->prepare('SELECT issue_id AS id FROM issue WHERE issue_title = :title');
             break;
         
         default:
             $message = 'type doesn\'t exist';
             return $message;
             break;
     } 

    $req->bindParam(':title', $title, PDO::PARAM_INT);

    $req->execute();

    $id = $req->fetch();

    return $id['id'];

}

function get_PM($PM_id){
    global $db; 

    $req = $db->prepare('SELECT PM_sender, PM_recipient, PM_title, PM_content, PM_sendDate, PM_read, member_username FROM privateMessage LEFT JOIN member ON member_id = PM_sender WHERE PM_id = :PM_id');

    $req->bindParam(':PM_id', $PM_id, PDO::PARAM_INT);

    $req->execute();

    $PM = $req->fetch();

    return $PM;

}

function get_receivedPMs($memberID){
    global $db; 

    $req = $db->prepare('SELECT PM_id, PM_sender, PM_title, PM_content, PM_sendDate, PM_read,
        member_username, member_picture
        FROM privateMessage
        LEFT JOIN member ON member_id = PM_sender
        WHERE PM_recipient = :memberID');

    $req->bindParam(':memberID', $memberID, PDO::PARAM_INT);

    $req->execute();

    $receivedPMs = $req->fetchAll();

    return $receivedPMs;

}

function get_sentPMs($memberID){
    global $db; 

    $req = $db->prepare('SELECT PM_id, PM_recipient, PM_title, PM_content, PM_sendDate, PM_read,
        member_username, member_picture
        FROM privateMessage
        LEFT JOIN member ON member_id = PM_recipient
        WHERE PM_sender = :memberID');

    $req->bindParam(':memberID', $memberID, PDO::PARAM_INT);

    $req->execute();

    $sentPMs = $req->fetchAll();

    return $sentPMs;

}