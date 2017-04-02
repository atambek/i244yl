<!DOCTYPE html>
<html>
	<meta charset="UTF-8">
	<head>
	</head>
	<body>
		<?php
			$myString = "murutraktorijuht";
			echo "Stringi $myString kuvamine peegelpildis --> ";
			function reverseString ($inputString) {
				$arr = array(); 
				//loeme üksikud tähed massiivi
				for ($i = 0;$i < strlen($inputString); $i++) {
					$arr[] = $inputString[$i];
				}				
				
				//loeme massiivi väärtused vastupidises järjestuses tagasi stringi
				for ($j = count($arr); $j > 0; $j--) {					
					if (isset($revString)) {
						$revString .= $arr[$j-1];
					} else {
						$revString = $arr[$j-1];
					}			
				}
				return $revString;
			}
			echo reverseString($myString);
		?>
	</body>
</html>