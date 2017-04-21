<?php
	session_start();
	
	require_once('head.html');
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
			include('pealeht.html');
			break;
		case "galerii":
			include('galerii.html');
			break;
		case "vote":
			if (isset($_SESSION['voted_for'])) {
				include('tulemus.html');
			} else {
				include('vote.html');			
			}
			break;
		case "tulemus":
			include('tulemus.html');
			break;			
		default:
			include('pealeht.html');
			break;		
	}
	require_once('foot.html');
?>
