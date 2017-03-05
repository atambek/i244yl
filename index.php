<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Andres Tambeki kodukas</title>
	<style>
		body {
			background-color:lightblue;
		}

		h1 {
			color:navy;
			margin-left:20px;
		}

		h2 {
			color:red;
			text-align:center;
		}
		
		h3 {
			color:orange;
			text-align:center;
		}
		
		h4 {
			color:darkgreen;
			text-align:center;
		}
		
		h5 {
			color:lightgreen;
			text-align:center;
		}
		p {
			font-style:italic;
		}

		.intro_text {
			background-color:yellow;
			font-family:monospace;
		}

		.profile_pic {
			width:512px;
			height:384px;
		}
		ul {
			list-style-image:url('pics/SmartWatch1_thumb.jpg');
		}
		#introduction {
			text-align:justify;
			border
		}
		p.introduction {
			border-style:dashed;
			border-radius:5px;
			background-color:lightgray;
		}
		a {
			text-decoration: none; 
		}
		img.profile_pic {
			cursor:wait;
		}
	</style>
  </head>

  <body>
    <h1>
	Tere tulemast minu kodukale!
	</h1>
    <h2>
	Alapealkiri 2
	</h2>
    <h3>
	Alapealkiri 3
	</h3>	
    <h4>
	Alapealkiri 4
	</h4>	
    <h5>
	Alapealkiri 5
	</h5>	
    <h6>
	Alapealkiri 6
	</h6>		
	<p class="intro_text">
		See on Andres Tambeki üks esimesi veebilehti. <br>
	</p>
	<div>
		<img class="profile_pic" src="pics/ant.jpeg" alt="Portreepilt">
	</div>
	<p class="introduction">
		Tere! Andres nimeks. Üks haridus juba TÜ majandusteaduskonnast all.
		Õppetraumadest ülesaamine võttis pealt 10 aastat aega ja siin ma nüüd siis taas omadega olen.
		Elu viis juba tegelikult üsna varakult majandusvaldkonnast pigem IT teemadesse, kuigi tööl on need siiski tugevalt läbipõimunud.
		Minu ainus ja seni viimane töökoht on olnud Columbus Eestis majandustarkvara konsultandi/arendajana.
		Tegutsenud selles valdkonnas nüüdseks üle 11 aasta.
	</p>	
	<ul>
		<li>element1</li>
		<li>element2</li>
		<li>element3</li>
	</ul>
	<ol>
		<li>element1</li>
		<li>element2</li>
		<li>element3</li>
	</ol>
	
	<p>
	Minu Linkedin profiil asub 
		<a href="https://linkedin.com/in/andres-tambek-425b533b">siin</a>
	</p>
	<p class="linkedin_link">
		<a href="http://validator.w3.org/check?uri=referer">
			<img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict" height="31" width="88" />
		</a>
	</p>
	<?php echo phpversion("tidy")?>
  </body>
</html>
