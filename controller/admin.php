<?php

// if ($id!=4) error(ERR_IS_NOT_ADMIN);

if(checkAuthorisation(ADMIN)){
	$query = (isset($_GET['query'])?htmlspecialchars($_GET['query']):'');
	$username_error1 = null;
	$username_error2 = null;
	$password_error = null;
	$rank_error = null;
	$title_error = null;
	$content_error = null;
	$date = date('Y-m-d H:i:s');
	switch ($query) {
		case 'members':
				$action=(isset($_GET['action'])?htmlspecialchars($_GET['action']):'');
				$member_id =(isset($_GET['id'])?(int) $_GET['id']:false);
				$member = get_memberByID($member_id);
				switch ($action) {
					case 'edit':
						if(isset($_POST['submit'])){
							$i = 0;
							$username= htmlspecialchars($_POST['username']);
							$password = (!empty($_POST['password'])?md5($_POST['password']):$member['member_password']);
							$confirm = (!empty($_POST['confirm'])?md5($_POST['confirm']):$member['member_password']);
							$rank = (int) $_POST['rank'];
							$picture = (isset($_POST['delete'])?'0':$member['member_picture']);
							if($username != $member['member_username']){
								$username_alreadyTaken = alreadyTaken('username', $username);
								if($username_alreadyTaken){
									$username_error1 = "Ce pseudo est déjà utilisé par un membre";
									$i++;
								}
								if (strlen($username) < $configs['usernameMinLength'] || strlen($username) > $configs['usernameMaxLength']){
									$username_error2 = "Votre pseudo est soit trop grand, soit trop petit";
									$i++;
								}
							}
							if($password != '' || $confirm != ''){
								if($password != $confirm){
									$password_error = "Votre mot de passe et votre confirmation diffèrent ou sont vides";
									$i++;
								}
							}
							if($rank != $member['member_rank']){
								if($rank<0||$rank>4){
									$rank_error = 'Ce rang n\'existe pas';
									$i++;
								}
							}
							if($i==0){
								update_memberADMIN($member_id, $username, $password, $picture, $rank);
								header("Location:ari.php?page=admin&query=members");
							}

						}
						break;

					case 'delete':
						if(isset($_POST['confirm'])){
							delete_member($member_id);
							header("Location:ari.php?page=admin&query=members");
						}
						break;
					
					default:
						$members = get_members();
						break;
				}
			break;

		case 'configs':
			if(isset($_POST['submit'])){
				foreach ($confs as $key => $conf) {
					if($conf['config_value'] != $_POST[$conf['config_name']]){
						$newValue = htmlspecialchars($_POST[$conf['config_name']]);
						update_config($conf['config_name'], $newValue);
					}
				}
				header("Location:ari.php?page=admin&query=configs");
			}
			break;

		case 'news':
			// $news = get_news();
			// foreach ($news as $key => $new) {
			// 	$news[$key]['news_content'] = replaceCode(htmlspecialchars($new['news_content']));
			// 	$news[$key]['news_title'] = replaceCode(htmlspecialchars($new['news_title']));
			// }
			if(isset($_POST['title'])){
				$i = 0;
				if(empty($_POST['title'])){
					$i++;
					$title_error = 'Il manque un titre';
				}
				else $title = htmlspecialchars($_POST['title']);
				if(empty($_POST['content'])){
					$i++;
					$content_error = 'Il manque du contenu';
				}
				else $content = htmlspecialchars($_POST['content']);
				if($i==0){
					set_news($title, $content, $id, $date);
					header("Location:ari.php?page=admin");
				}
			}
			break;

		case 'intro':
			// $intro = get_intro();
			// $intro['intro_title'] = replaceCode(htmlspecialchars($intro['title']));
			// $intro['intro_content'] = replaceCode(htmlspecialchars($intro['title']));
			if(isset($_POST['title'])){
				$i = 0;
				if(empty($_POST['title'])){
					$i++;
					$title_error = 'Il manque un titre';
				}
				else $title = htmlspecialchars($_POST['title']);
				if(empty($_POST['content'])){
					$i++;
					$content_error = 'Il manque du contenu';
				}
				else $content = htmlspecialchars($_POST['content']);
				if($i==0){
					set_intro($title, $content, $id, $date);
					header("Location:ari.php?page=admin");
				}
			}
			break;
		/*
		case 'sections':
			$sections = get_sections();
			if(isset($_GET['s'])){
				$sectionID_admin = (int) $_GET['s'];
				$issues_admin = get_issues($sectionID_admin);
				// $remedies_admin = get_remedies($sectionID_admin);
				// $acts_admin = get_issues($sectionID_admin);
				
			}

			break;
		*/
		
		default:
			# code...
			break;
	}
}
else error(ERR_IS_NOT_ADMIN);