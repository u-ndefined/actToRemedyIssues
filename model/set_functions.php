<?php

function set_vote($authorID, $type, $subjectID, $value){
    global $db;

    $vote = '0';

    $query=$db->prepare('INSERT INTO vote (vote_authorID, vote_subjectType, vote_subjectID, vote_value)
        VALUES (:authorID, :type, :subjectID, :value)');

        $query->bindValue(':authorID',$authorID,PDO::PARAM_INT);

        $query->bindValue(':type', $type, PDO::PARAM_STR);

        $query->bindValue(':subjectID',$subjectID,PDO::PARAM_INT);

        $query->bindValue(':value', $value, PDO::PARAM_INT);

        $query->execute();

}

function set_comment($content, $authorID, $postDate, $subjectType, $subjectID){
    global $db;

    $vote = '0';

    $query=$db->prepare('INSERT INTO comment (comment_content, comment_authorID, comment_postDate, comment_subjectType, comment_subjectID , comment_vote) VALUES (:content, :authorID, :postDate, :subjectType, :subjectID, :vote)');

        $query->bindValue(':content', $content, PDO::PARAM_STR);

        $query->bindValue(':authorID', $authorID, PDO::PARAM_STR);

        $query->bindValue(':postDate', $postDate, PDO::PARAM_INT);

        $query->bindValue(':subjectType', $subjectType, PDO::PARAM_INT);

        $query->bindValue(':subjectID', $subjectID, PDO::PARAM_INT);

        $query->bindValue(':vote', $vote, PDO::PARAM_INT);

        $query->execute();

}

function set_intro($title, $content, $authorID, $postDate){
    global $db;

    $query=$db->prepare('INSERT INTO intro (intro_title, intro_content, intro_authorID, intro_postDate)

        VALUES (:title, :content, :authorID, :postDate)');

        $query->bindValue(':title', $title, PDO::PARAM_STR);

        $query->bindValue(':content', $content, PDO::PARAM_STR);

        $query->bindValue(':authorID', $authorID, PDO::PARAM_STR);

        $query->bindValue(':postDate', $postDate, PDO::PARAM_INT);

        $query->execute();
}

function set_news($title, $content, $authorID, $postDate){
    global $db;

    $query=$db->prepare('INSERT INTO news (news_title, news_content, news_authorID, news_postDate)

        VALUES (:title, :content, :authorID, :postDate)');

        $query->bindValue(':title', $title, PDO::PARAM_STR);

        $query->bindValue(':content', $content, PDO::PARAM_STR);

        $query->bindValue(':authorID', $authorID, PDO::PARAM_STR);

        $query->bindValue(':postDate', $postDate, PDO::PARAM_INT);

        $query->execute();
}

function set_PM($senderID, $recipientID, $title, $content, $sendDate){
    global $db;

    $query=$db->prepare('INSERT INTO privateMessage (PM_sender, PM_recipient, PM_title, PM_content, PM_sendDate, PM_read)

        VALUES (:senderID, :recipientID, :title, :content, :sendDate, :read)');

        $query->bindValue(':senderID', $senderID, PDO::PARAM_STR);

        $query->bindValue(':recipientID', $recipientID, PDO::PARAM_INT);

        $query->bindValue(':title', $title, PDO::PARAM_STR);

        $query->bindValue(':content', $content, PDO::PARAM_STR);

        $query->bindValue(':sendDate', $sendDate, PDO::PARAM_INT);

        $query->bindValue(':read', '0', PDO::PARAM_INT);

        $query->execute();
}

function set_member($username, $password, $email, $pictureName, $date){
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