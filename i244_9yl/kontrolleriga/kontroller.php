<?php require_once('head.html');
	$dir = "pildid";
	$failid = array();
	if ($dh = opendir($dir)) {
		while (($file = readdir($dh)) !== false) {
			if(!is_dir($file)) {
				$failid[] = $file;
			}
		}
		closedir($dh);
	}
	else {
		die("Ei suuda avada kataloogi $dir");
	}
	$link = "";
	if (isset($_GET['page']) && $_GET['page']!="") {
		$link=$_GET['page'];
	} else {
		$msg = "Linki ei suudetud lahendada";
	}
	
	switch($link) {
		case "pealeht":
			require_once('pealeht.html');
			break;
		case "galerii":
			require_once('galerii.html');
			break;
		case "vote":
			require_once('vote.html');			
			break;
		case "tulemus":
			require_once('tulemus.html');
			break;			
		case "":
			require_once('pealeht.html');
			break;		
	}
	require_once('foot.html');
?>
