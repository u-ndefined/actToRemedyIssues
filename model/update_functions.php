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