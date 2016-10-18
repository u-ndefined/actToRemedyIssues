<?php
if ($id==0) error(ERR_IS_NOT_CO);

$action = (isset($_GET['action'])?htmlspecialchars($_GET['action']):'');

switch ($action) {
	case 'read':
		$query = (isset($_GET['query'])?htmlspecialchars($_GET['query']):'');
		switch ($query) {
			case 'received':
				$PMs = get_receivedPMs($id);
				break;

			case 'sent':
				$PMs = get_sentPMs($id);
				break;
			
			default:
				# code...
				break;
		}
		// $receivedPMs = get_receivedPMs($id);
		// $sentPMs = get_sentPMs($id);
		// $PM_id = (int) $_GET['PM_id'];
		// $PM = get_PM($PM_id);
		// if($id != $PM['PM_receiver']) error(ERR_WRONG_USER);
		// if($PM['PM_read'] == 0) update_PMread($PM_id);
		break;

	case 'new':
		if(isset($_GET['recipient'])) $new_title = 'Répondre';
		else $new_title = 'Nouveau message';
		$recipient = (isset($_GET['recipient'])?htmlspecialchars($_GET['recipient']):'');
		if(isset($_GET['previousPM_id'])){
			$previousPM_id = (int) $_GET['previousPM_id'];
			$previousPM = get_PM($previousPM_id);
			$recipient = $previousPM['member_username'];
		}
		else $previousPM = null;
		if(isset($_POST['content'])){
			$i = null;
			$date = date('Y-m-d H:i:s');
			$recipient_error = null;
			$recipientNotFound_error = null;
			$title_error = null;

			$content = htmlspecialchars($_POST['content']);

			if(empty($_POST['title'])){
				$i++;
				$title_error = 'Il manque un titre à votre message';
			}
			else $title = htmlspecialchars($_POST['title']);
			if(empty($_POST['recipient'])){
				$i++;
				$recipient_error = 'Il manque un destinataire à votre message';
			}
			else{
				$recipient = htmlspecialchars($_POST['recipient']);
				$memberFound = findMember($recipient);
				if(!$memberFound){
					$i++;
					$recipientNotFound_error = 'Le destinataire n\'existe pas';
				}
				else{
					$recipient = get_memberByName($recipient);
				}
			}

			if($i==0){
				set_PM($id, $recipient['member_id'], $title, $content, $date);
				header('Location:ari.php?page=mailbox&action=read&query=sent');
			}
		}

		break;

		//ATTENTION ! Il faut mieux gérer la suppression de messages
	case 'delete':
		if(isset($_GET['PM_id'])){
			$PM_id = $_GET['PM_id'];
			$PM = get_PM($PM_id);
			if($PM['PM_recipient'] != $id) error(ERR_WRONG_USER);
			if(isset($_POST['delete'])){
				delete_PM($PM_id);
				header('Location:ari.php?page=mailbox&action=read&query=received');
			}
		}
		break;
	
	default:
		# code...
		break;
}
