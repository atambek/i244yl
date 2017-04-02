<!DOCTYPE html>
<html>
	<meta charset="UTF-8">
	<style>
		body {
			display: block;
			margin: 8px;
		}
		.isane {
			background-color: navy;
			color: yellow;
		}
		.emane {
			background-color: #FF69B4;
			color: navy;
		}
	</style>
	<head>
	</head>
	<body>
		<?php
			global $koerad;
			$koerad = array(
				array('nimi'=>'Messi','tõug'=>'bokser','vanus'=>5,'värv'=>'pruun','sugu'=>'emane'),
				array('nimi'=>'Karri','tõug'=>'saksa lambakoer','vanus'=>8,'värv'=>'pruun','sugu'=>'isane'),
				array('nimi'=>'Yoko','tõug'=>'cane corso','vanus'=>1,'värv'=>'must','sugu'=>'emane'),
				array('nimi'=>'Mattias','tõug'=>'kuldne retriiver','vanus'=>6,'värv'=>'valge','sugu'=>'isane')
			);
			foreach ($koerad as $koer) {
				include 'myHTML.html';
			}
		?>
	</body>
</html>