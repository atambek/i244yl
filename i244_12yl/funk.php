<?php

function connect_db(){
	global $connection;
	$host="localhost";
	$user="test";
	$pass="t3st3r123";
	$db="test";
	$connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa ühendust mootoriga- ".mysqli_error());
	mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));
}

function logi() {	
	// siia on vaja funktsionaalsust (13. nädalal)
	if (isset($_SESSION['user'])) {
		kuva_puurid();
	}
	else {
		include_once('views/login.html');
	}
	
		if ($_SERVER['REQUEST_METHOD']=='GET'){
			include_once('views/login.html');
		}
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		if (empty($_POST['user'])) {
			$errors[] = "Kasutajanimi on puudu!";
			include_once('views/login.html');
		}
		else if (empty($_POST['pass'])) {
			$errors[] = "Parool on puudu!";
			include_once('views/login.html');
		}
		else {
			global $connection;
			$trim_user =  mysqli_real_escape_string($connection,htmlspecialchars($_POST['user']));
			$trim_pass = mysqli_real_escape_string($connection,htmlspecialchars($_POST['pass']));
			$users_query ="SELECT * FROM atambek_kylastajad WHERE username = '$trim_user' AND passw = SHA1('$trim_pass')";	
			$users_result=mysqli_query($connection, $users_query) or die("$users_query - ".mysqli_error($connection));
			if (mysqli_num_rows($users_result) != 0){
				$_SESSION['user'] = mysqli_fetch_assoc($users_result);
				kuva_puurid();
			}else{
				$errors[] = "Kasutajanimi või parool on vale";
				include_once('views/login.html');
			}
		}
	}
	
}

function logout(){
	$_SESSION=array();
	session_destroy();
	header("Location: ?");
}

function kuva_puurid() {
	// siia on vaja funktsionaalsust
	global $connection;
	if(isset($_SESSION['user'])) {
		$puurid_query ="SELECT DISTINCT(puur) as cage FROM atambek_loomaaed ORDER BY puur";
		$puurid_result = mysqli_query($connection, $puurid_query) or die("$puurid_query - ".mysqli_error($connection));
		$puurid = array();
		while ($puuri_nr=mysqli_fetch_assoc($puurid_result)) {
			$loomad_query = "SELECT * FROM atambek_loomaaed WHERE puur=".mysqli_real_escape_string($connection,$puuri_nr['cage']);
			$loomad_result=mysqli_query($connection, $loomad_query) or die("$loomad_query - ".mysqli_error($connection));
			while ($loomarida=mysqli_fetch_assoc($loomad_result)) {
				$puurid[$puuri_nr['cage']][]=$loomarida;
			}	
		}
		include_once('views/puurid.html');
	}
	else {
		include_once('views/login.html');
	}
}

function lisa() {
	// siia on vaja funktsionaalsust (13. nädalal)
	global $connection;
	if (empty($_SESSION['user'])) {
		include_once('views/login.html');
	} else {
		include_once('views/loomavorm.html');
	}
	
	if ($_SERVER['REQUEST_METHOD']=='GET'){
		include_once('views/loomavorm.html');
	}
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if (empty($_POST['nimi'])) {
			$errors[] = "Nimi on määramata!";
		}
		if (empty($_POST['vanus'])) {
			$errors[] = "Vanus on määramata!";
		}
		if (empty($_POST['puur'])) {
			$errors[] = "Puuri on määramata!";
		}
		if (empty($_FILES['liik']['name'])) {
			$errors[] = "Pilt on lisamata!";
		}
		$nimi = mysqli_real_escape_string($connection, $_POST['nimi']);
		$vanus = mysqli_real_escape_string($connection, $_POST['vanus']);
		$puur = mysqli_real_escape_string($connection, $_POST['puur']);
		$liik = mysqli_real_escape_string($connection, "pildid/".$_FILES["liik"]["name"]);
		if (upload($liik) == "") {
			$errors[]= "Lisamine ebaõnnestus!";
		}
		if (empty($errors)) {
			$query = "INSERT INTO atambek_loomaaed (nimi, vanus, puur, liik) VALUES ('$nimi','$vanus','$puur','$liik')";
			$result = mysqli_query($connection, $query);
			if (mysqli_insert_id($connection) > 0) {
				include_once('views/loomavorm.html');
			} else {
				$errors[]= "Lisamine ebaõnnestus!";
			}
		}
	}
}
function upload($name) {
	$allowedExts = array("jpg", "jpeg", "gif", "png");
	$allowedTypes = array("image/gif", "image/jpeg", "image/png","image/pjpeg");
	//$extension = (end(explode(".", $_FILES[$name]["name"])));
	$tmp = explode('.', $_FILES[$name]["name"]);
	$extension = end($tmp);
	if ( in_array($_FILES[$name]["type"], $allowedTypes)
		&& ($_FILES[$name]["size"] < 100000)
		&& in_array($extension, $allowedExts)) {
    // fail õiget tüüpi ja suurusega
		if ($_FILES[$name]["error"] > 0) {
			$_SESSION['notices'][]= "Return Code: " . $_FILES[$name]["error"];
			return "";
		} else {
      // vigu ei ole
			if (file_exists("pildid/" . $_FILES[$name]["name"])) {
        // fail olemas ära uuesti lae, tagasta failinimi
				$_SESSION['notices'][]= $_FILES[$name]["name"] . " juba eksisteerib. ";
				return "pildid/" .$_FILES[$name]["name"];
			} else {
        // kõik ok, aseta pilt
				move_uploaded_file($_FILES[$name]["tmp_name"], "pildid/" . $_FILES[$name]["name"]);
				return "pildid/" .$_FILES[$name]["name"];
			}
		}
	} else {
		return "";
	}
}
?>