<?php
if ($id==0) error(ERR_IS_NOT_CO);

$type = (isset($_GET['type'])?htmlspecialchars($_GET['type']):'');

$subjectID = (isset($_GET['id'])?(int)$_GET['id']:'');

$vote = (isset($_GET['vote'])?(int)$_GET['vote']:'');

$sectionID = (isset($_GET['s'])?(int)$_GET['s']:'');

vote($id, $type, $subjectID, $vote);

header('Location:ari.php?page=section&s='.$sectionID);
