<?php

if(isset($_GET['s'])){ //si l'utilisateur a choisit une section
	$s = htmlspecialchars($_GET['s']);

	$issues = get_issues($s);

	foreach ($issues as $key => $issue) {
		//sécurise les issues
		$issues[$key]['issue_title'] = replaceCode(htmlspecialchars($issue['issue_title']));
		$issues[$key]['issue_content'] = replaceCode(htmlspecialchars($issue['issue_content']));

		//récupère les remedies
		$remedies[$key] = get_remedies($issue['issue_id']);

		//récupère les votes des issues
		$issues[$key]['issue_urgency'] = get_votes('issue', $issue['issue_id']);

		foreach ($remedies[$key] as $key2 => $remedy) {
			//sécurise les remedies
			$remedies[$key][$key2]['remedy_title'] = replaceCode(htmlspecialchars($remedy['remedy_title']));
			$remedies[$key][$key2]['remedy_content'] = replaceCode(htmlspecialchars($remedy['remedy_content']));

			//récupère les acts
			$acts[$key][$key2] = get_acts($remedy['remedy_id']);

			//récupère les votes des remedies
			$remedies[$key][$key2]['remedy_relevence'] = get_votes('remedy', $remedy['remedy_id']);

			foreach ($acts[$key][$key2] as $key3 => $act) {
				//sécurise les Acts
				$acts[$key][$key2][$key3]['act_title'] = replaceCode(htmlspecialchars($act['act_title']));
				$acts[$key][$key2][$key3]['act_content'] = replaceCode(htmlspecialchars($act['act_content']));
				
				//récupère les votes des remedies
				$acts[$key][$key2][$key3]['act_feasibility'] = get_votes('act', $act['act_id']);


			}
		}
	}
}