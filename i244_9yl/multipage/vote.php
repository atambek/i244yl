<?php
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
?>
<div id="wrap">
	<h3>Vali oma lemmik :)</h3>
	<form action="tulemus.php" method="GET">
		<?php
			foreach ($failid as $key=>$value) {
				echo
					"<p>
						<label for='p'.$key>
							<img src=$dir/$value alt='nimetu'.$key height='100' />
						</label>
						<input type='radio' value=$dir/$value id='p'.$key name='pilt'/>
					</p>";
			}
		?>		
		<input type="submit" value="Valin!"/>
	</form>

</div>
<?php require_once('foot.html');?>