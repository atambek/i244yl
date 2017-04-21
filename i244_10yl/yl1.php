<?php
session_start();

if (!isset($_SESSION['tx'])) 
	$_SESSION['tx'] = "";

if (!isset($_SESSION['bg'])) 
	$_SESSION['bg'] = "#fff";

if (!isset($_SESSION['tc'])) 
	$_SESSION['tc'] = "#fff";
	
if (!isset($_SESSION['bw'])) 
	$_SESSION['bw'] = 2;

if (!isset($_SESSION['bs'])) 
	$_SESSION['bs'] = "solid";

if (!isset($_SESSION['bc'])) 
	$_SESSION['bc'] = "black";

if (!isset($_SESSION['br'])) 
	$_SESSION['br'] = 10;


if (isset($_POST['text']))
	$_SESSION['tx'] = htmlspecialchars($_POST['text']);

if (isset($_POST['bg']))
	$_SESSION['bg'] = htmlspecialchars($_POST['bg']);

if (isset($_POST['tc'])) 
	$_SESSION['tc'] = htmlspecialchars($_POST['tc']);

if (isset($_POST['bw']) )
	$_SESSION['bw'] = htmlspecialchars($_POST['bw']);


if (isset($_POST['bs']) )
	$_SESSION['bs'] = htmlspecialchars($_POST['bs']);

if (isset($_POST['bc']) ) 
	$_SESSION['bc'] = htmlspecialchars($_POST['bc']);

$border=$_SESSION['bc']." ".$_SESSION['bs']." ".$_SESSION['bw']; 

if (isset($_POST['br']) )
	$_SESSION['br'] = htmlspecialchars($_POST['br']);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Praktikum  - Ülesanne</title>

    <style type="text/css">

        #text { background: <?php echo $_SESSION['bg']; ?>;
            color: <?php echo $_SESSION['tc']; ?>;
            border: <?php echo $border?>px;
            border-radius: <?php echo $_SESSION['br']; ?>px;
            padding:10px;
            min-height:100px;
            max-width: 400px;
        }

    </style>

</head>
<body>

    <?php 

    $stiilid=array("solid", "dashed", "dotted", "none", "double");

    ?>

    <div id="text"> <?php if (isset($_POST['text'])) echo htmlspecialchars($_POST['text']); ?></div>

    <hr/>
    <form method="POST" action="?">
        <textarea name="text" placeholder="kommentaari tekst"><?php echo $_SESSION['tx'];?></textarea>
        <br/>
        <input type="color" name="bg" id="bg" value=<?php echo $_SESSION['bg'];?>> 
        <label for="bg">Taustavärvus</label>
        <br/>
        <input type="color" name="tc" id="tc" value=<?php echo $_SESSION['tc'];?> > 
        <label for="tc">Tekstivärvus</label>
        <br/>
        <fieldset>
            <legend>Piirjoon</legend>
            <input type="number" min="0" max="20" step="1" name="bw" id="bw" value=<?php echo $_SESSION['bw'];?>>
            <label>Piirjoone laius (0-20px)</label>
            <br/>
            <select name="bs">
                <?php foreach($stiilid as $stiil):?>
					<option <?php if ($_SESSION['bs']==$stiil) echo "selected";?> ><?php echo $stiil; ?></option>
                <?php endforeach; ?>
            </select>
            <br/>
            <input type="color" name="bc" id="bc" value=<?php echo $_SESSION['bc'];?> > 
            <label for="bc">Piirjoone värvus</label>
            <br/>
            <input type="number" min="0" max="100" step="1" name="br" id="br" value=<?php echo $_SESSION['br'];?>>
            <label>Piirjoone nurga raadius (0-100px)</label>
            <br/>
        </fieldset>
        <input type="submit" value="esita" />
    </form>

</body>
</html>