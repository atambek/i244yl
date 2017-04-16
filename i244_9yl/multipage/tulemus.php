<?php
	require_once('head.html');
	if (isset($_GET['pilt']) && $_GET['pilt']!="") {
		$file=$_GET['pilt'];
	} else {
		$msg = "Valik jäi tegemata!";
	}
?>
<div id="wrap">
	<h3>Valiku tulemus</h3>
	<p>Siia tuleb valiku tulemus, mida saab kuvada ainult PHP abil :)</p>
	<p>
		<?php if (isset($file) && $file!="") {echo "<img src=$file alt=$file />";} else {echo $msg;} ?>
	</p>
</div>
<?php require_once('foot.html');?>