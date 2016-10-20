<?php

	global $db; 

    $req = $db->prepare('SELECT config_name, config_value FROM config');

    $req->execute();

    $confs = $req->fetchAll();

    $config = null;

    foreach ($confs as $key => $conf) {
    	$configs[$conf['config_name']] = $conf['config_value'];
    }
    