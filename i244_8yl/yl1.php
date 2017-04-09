<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title> Teksti kujundus </title>
		<?php
			$inputText=""; // vaikimisi tühi
			if (isset($_POST['tekst']) && $_POST['tekst']!="") {
				$inputText=htmlspecialchars($_POST['tekst']);
			}
			$bg_col="#fff"; // vaikimisi valge
			if (isset($_POST['bg_color']) && $_POST['bg_color']!="") {
				$bg_col=htmlspecialchars($_POST['bg_color']);
			}
			$f_col="black"; // vaikimisi must
			if (isset($_POST['f_color']) && $_POST['f_color']!="") {
				$f_col=htmlspecialchars($_POST['f_color']);
			}
			$bord_col="black"; // vaikimisi must
			if (isset($_POST['bord_color']) && $_POST['bord_color']!="") {
				$bord_col=htmlspecialchars($_POST['bord_color']);
			}
			$bord_rad="0px"; // vaikimisi 0px
			if (isset($_POST['bord_radius']) && $_POST['bord_radius']!="") {
				$bord_rad=htmlspecialchars($_POST['bord_radius']);
			}			
		?>
		<style type="text/css">
			#display_text{
				background: <?php echo $bg_col;?>;
				color: <?php echo $f_col;?>;
				border-radius:<?php echo $bord_rad;?>px;
				border-color: <?php echo $bord_col;?>;
				border-width: 15px;
				}
			label {
				width: 200px;
				float: left;
				}
		</style>
	</head>
	<body>
		<form name="tekst" method="POST">
			<textarea readonly id="display_text" cols="35" rows="5"><?php echo $inputText?></textarea>	
		</form>
		
		<form name="teksti_kujundamine" method="POST">
			<label for "tekst">Sisesta text: </label>
			<input type="text" name="tekst" size="100" wrap="soft" placeholder="sisesta oma tekst" value="<?php echo $inputText?>">
			<br>
			<br>
			<label for "bg_color">Taust: </label>
			<input type="color" name="bg_color" value="<?php echo $bg_col?>">
			<br>
			<br>
			<label for "f_color">Tekst: </label>
			<input type="color" name="f_color" value="<?php echo $f_col?>">
			<br>
			<br>
			<label for "bord_color">Piirjoon: </label>
			<select name="bord_color" value="<?php echo $bord_col?>">
				<option value="pink">Roosa</option>
				<option value="yellow">Kollane</option>
				<option value="navy">Sinine</option>
				<option value="brown">Pruun</option>
			</select>
			<br>
			<br>
			<label for "bord_radius">Piirjoone nurga raadius: </label>
			<input type="number" value="<?php echo $bord_rad?>" name="bord_radius" step="1" min="0" max="100">
			<br>
			<br>
			<input type="submit" name="present" value="Esita">
		</form>
	</body>
</html>