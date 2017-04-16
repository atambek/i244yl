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
?>
<div id="wrap">
	<h3>Fotod</h3>
	<div id="gallery">
		<?php
			foreach ($failid AS $value) {
				echo "<img src=$dir/$value alt=$dir/$value />";
			}
		?>
	</div>
</div>
<?php require_once('foot.html');?>