<?php
require("includes/first_php.php");

require_once('model/get_functions.php');

$sections = get_sections();

// On effectue du traitement sur les données (contrôleur)

// Ici, on doit surtout sécuriser l'affichage

foreach($sections as $key => $section){
	//sécurise les sections
	$sections[$key]['section_name'] = htmlspecialchars($section['section_name']);
}

if(isset($_GET['section'])){ //si l'utilisateur a choisit une section
	$section = htmlspecialchars($_GET['section']);

	$issues = get_issues($section);

	foreach ($issues as $key => $issue) {
		//sécurise les issues
		$issues[$key]['issue_title'] = htmlspecialchars($issue['issue_title']);
		$issues[$key]['issue_content'] = htmlspecialchars($issue['issue_content']);

		//récupère les remedies
		$remedies[$key] = get_remedies($issue['issue_id']);

		foreach ($remedies[$key] as $key2 => $remedy) {
			//sécurise les remedies
			$remedies[$key][$key2]['remedy_title'] = htmlspecialchars($remedy['remedy_title']);
			$remedies[$key][$key2]['remedy_content'] = htmlspecialchars($remedy['remedy_content']);

			//récupère les acts
			$acts[$key][$key2] = get_acts($remedy['remedy_id']);

			foreach ($acts[$key][$key2] as $key3 => $act) {
				//sécurise les Acts
				$acts[$key][$key2][$key3]['act_title'] = htmlspecialchars($act['act_title']);
				$acts[$key][$key2][$key3]['act_content'] = htmlspecialchars($act['act_content']);
			}
		}
	}
}

// // On affiche la page (vue)

include_once('view/index.php');