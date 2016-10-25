<?php

function error($err=''){

   $mess=($err!='')? $err:'Une erreur inconnue s\'est produite';

   exit('<p>'.$mess.'</p>

   <p>Cliquez <a href="./ari.php">ici</a> pour revenir à la page d\'accueil</p></div></body></html>');

}

function toValidURL($url){
	$string = $url;
	$pattern = '#/actToRemedyIssues/#';
	$replacement = '';
	$validURL = preg_replace($pattern, $replacement, $string);
	return $validURL;
}

function move_avatar($avatar)

{

    $extension_upload = strtolower(substr(  strrchr($avatar['name'], '.')  ,1));

    $name = time();

    $nomavatar = str_replace(' ','',$name).".".$extension_upload;

    $name = "./images/avatars/".str_replace(' ','',$name).".".$extension_upload;

    move_uploaded_file($avatar['tmp_name'],$name);

    return $nomavatar;

}

function truncate($string, $length=100, $append="&hellip;") {
  $string = trim($string);

  if(strlen($string) > $length) {
    $string = wordwrap($string, $length);
    $string = explode("\n", $string, 2);
    $string = $string[0] . $append;
  }

  return $string;
}

function checkAuthorisation($authorisation_required)

{

$level=(isset($_SESSION['level']))?$_SESSION['level']:1;

return ($authorisation_required <= intval($level));

}

function alreadyVoted($authorID, $type, $subjectID, $value){
  $vote = get_vote($authorID, $type, $subjectID);
  $voted = ($vote['vote_value'] == $value?true:false);
  return $voted;
}

function vote($authorID, $type, $subjectID, $value){
  $vote = get_vote($authorID, $type, $subjectID);

  if(empty($vote)) set_vote($authorID, $type, $subjectID, $value);
  else {
    $canVote = ($vote['vote_value'] == $value?false:true);
    if($canVote) update_vote($authorID, $type, $subjectID, $value);
    else error(ERR_ALREADY_VOTED);
  }
}






