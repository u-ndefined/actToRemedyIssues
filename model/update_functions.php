<?php

function update_memberPicture($memberID, $pictureName){

	global $db;

    $query=$db->prepare('UPDATE member SET member_picture = :picture WHERE member_id = :id');

                $query->bindValue(':picture',$pictureName,PDO::PARAM_STR);

                $query->bindValue(':id',$memberID,PDO::PARAM_INT);

                $query->execute();
}

function update_member($password, $email, $memberID){

	global $db;

    $query=$db->prepare('UPDATE member

        SET  member_password = :password, member_email = :email

        WHERE member_id = :memberID');

        $query->bindValue(':password',$password,PDO::PARAM_INT);

        $query->bindValue(':email',$email,PDO::PARAM_STR);

        $query->bindValue(':memberID',$memberID,PDO::PARAM_INT);

        $query->execute();
}

function update_issue($issueID, $title, $content, $sources, $modifyDate){

    global $db;

    $query=$db->prepare('UPDATE issue

        SET  issue_title = :title, issue_content = :content, issue_sources = :sources, issue_modifyDate = :modifyDate

        WHERE issue_id = :issueID');

        $query->bindValue(':title',$title,PDO::PARAM_INT);

        $query->bindValue(':content',$content,PDO::PARAM_STR);

        $query->bindValue(':sources',$sources,PDO::PARAM_INT);

        $query->bindValue(':modifyDate',$modifyDate,PDO::PARAM_INT);

        $query->bindValue(':issueID',$issueID,PDO::PARAM_INT);

        $query->execute();
}

function update_remedy($remedyID, $title, $content, $sources, $modifyDate){

    global $db;

    $query=$db->prepare('UPDATE remedy

        SET  remedy_title = :title, remedy_content = :content, remedy_sources = :sources, remedy_modifyDate = :modifyDate

        WHERE remedy_id = :remedyID');

        $query->bindValue(':title',$title,PDO::PARAM_INT);

        $query->bindValue(':content',$content,PDO::PARAM_STR);

        $query->bindValue(':sources',$sources,PDO::PARAM_INT);

        $query->bindValue(':modifyDate',$modifyDate,PDO::PARAM_INT);

        $query->bindValue(':remedyID',$remedyID,PDO::PARAM_INT);

        $query->execute();
}

function update_act($actID, $title, $content, $modifyDate){

    global $db;

    $query=$db->prepare('UPDATE act

        SET  act_title = :title, act_content = :content, act_modifyDate = :modifyDate

        WHERE act_id = :actID');

        $query->bindValue(':title',$title,PDO::PARAM_INT);

        $query->bindValue(':content',$content,PDO::PARAM_STR);

        $query->bindValue(':modifyDate',$modifyDate,PDO::PARAM_INT);

        $query->bindValue(':actID',$actID,PDO::PARAM_INT);

        $query->execute();
}