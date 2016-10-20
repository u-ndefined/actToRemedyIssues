<?php
function update_news($newsID, $title, $content){

    global $db;

    $query=$db->prepare('UPDATE news SET news_title = :title, news_content = :content WHERE news_id = :newsID');

                $query->bindValue(':title',$title,PDO::PARAM_STR);

                $query->bindValue(':content',$content,PDO::PARAM_INT);

                $query->bindValue(':newsID',$newsID,PDO::PARAM_INT);

                $query->execute();
}

function update_intro($introID, $title, $content){

    global $db;

    $query=$db->prepare('UPDATE intro SET intro_title = :title, intro_content = :content WHERE intro_id = :introID');

                $query->bindValue(':title',$title,PDO::PARAM_STR);

                $query->bindValue(':content',$content,PDO::PARAM_INT);

                $query->bindValue(':introID',$introID,PDO::PARAM_INT);

                $query->execute();
}

function update_config($name, $value){

    global $db;

    $query=$db->prepare('UPDATE config SET config_value = :value WHERE config_name = :name');

                $query->bindValue(':value',$value,PDO::PARAM_STR);

                $query->bindValue(':name',$name,PDO::PARAM_INT);

                $query->execute();
}

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

function update_memberADMIN($memberID, $username, $password, $picture, $rank){

    global $db;

    $query=$db->prepare('UPDATE member

        SET  member_username = :username, member_password = :password, member_picture = :picture, member_rank = :rank

        WHERE member_id = :memberID');

        $query->bindValue(':username',$username,PDO::PARAM_INT);

        $query->bindValue(':password',$password,PDO::PARAM_INT);

        $query->bindValue(':picture',$picture,PDO::PARAM_STR);

        $query->bindValue(':rank',$rank,PDO::PARAM_INT);

        $query->bindValue(':memberID',$memberID,PDO::PARAM_INT);

        $query->execute();
}


function update_issue($issueID, $title, $content, $sources, $modifyDate, $sectionID){

    global $db;

    $query=$db->prepare('UPDATE issue

        SET  issue_title = :title, issue_content = :content, issue_sources = :sources, issue_modifyDate = :modifyDate, issue_sectionID = :sectionID

        WHERE issue_id = :issueID');

        $query->bindValue(':title',$title,PDO::PARAM_INT);

        $query->bindValue(':content',$content,PDO::PARAM_STR);

        $query->bindValue(':sources',$sources,PDO::PARAM_INT);

        $query->bindValue(':modifyDate',$modifyDate,PDO::PARAM_INT);

        $query->bindValue(':issueID',$issueID,PDO::PARAM_INT);

        $query->bindValue(':sectionID',$sectionID,PDO::PARAM_INT);

        $query->execute();
}

function update_remedy($remedyID, $title, $content, $sources, $modifyDate, $issueID){

    global $db;

    $query=$db->prepare('UPDATE remedy

        SET  remedy_title = :title, remedy_content = :content, remedy_sources = :sources, remedy_modifyDate = :modifyDate, remedy_issueID = :issueID

        WHERE remedy_id = :remedyID');

        $query->bindValue(':title',$title,PDO::PARAM_INT);

        $query->bindValue(':content',$content,PDO::PARAM_STR);

        $query->bindValue(':sources',$sources,PDO::PARAM_INT);

        $query->bindValue(':modifyDate',$modifyDate,PDO::PARAM_INT);

        $query->bindValue(':remedyID',$remedyID,PDO::PARAM_INT);

        $query->bindValue(':issueID',$issueID,PDO::PARAM_INT);

        $query->execute();
}

function update_act($actID, $title, $content, $modifyDate, $remedyID){

    global $db;

    $query=$db->prepare('UPDATE act

        SET  act_title = :title, act_content = :content, act_modifyDate = :modifyDate, act_remedyID = :remedyID

        WHERE act_id = :actID');

        $query->bindValue(':title',$title,PDO::PARAM_INT);

        $query->bindValue(':content',$content,PDO::PARAM_STR);

        $query->bindValue(':modifyDate',$modifyDate,PDO::PARAM_INT);

        $query->bindValue(':actID',$actID,PDO::PARAM_INT);

        $query->bindValue(':remedyID',$remedyID,PDO::PARAM_INT);

        $query->execute();
}

function update_PMread($PM_id){
    global $db;

    $query=$db->prepare('UPDATE privateMessage

        SET  PM_read = :read

        WHERE PM_id = :PM_id');

        $query->bindValue(':read','1',PDO::PARAM_INT);

        $query->bindValue(':PM_id',$PM_id,PDO::PARAM_INT);

        $query->execute();

}