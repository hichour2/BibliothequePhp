<?php
try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=BIBLIO', 'root', '');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}
$req1 =$bdd->prepare('SELECT * FROM ouvrages WHERE N_inventaire = ?');
$req1->execute(array($_GET['N_inven']));
$IDouvr =$req1->fetch();
$req = $bdd->prepare('INSERT INTO keywords (keyword , ID_ouvrages) VALUES(:keyword , :ID_ouvrages)');
$req->execute(array('keyword' => $_POST['keyword1'],
'ID_ouvrages'=> $IDouvr['ID_ouvrages']
));
$req->closeCursor();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<title>Gestionnaire de bibliotheque</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<meta name="author" content="kchiriyassine" /> 
	<meta name="robots" content="index" />
	<link rel="stylesheet" media="screen" type="text/css" title="Style" href="../style.css" />
</head>

<body>
	<div id="en_tete">
	<table align ="center">
	<tr>
	<td><img src ="../IMG/ormvam.png" id="LOGO" ></td>
	<td><img height = "150px" width ="550px" src ="../IMG/gestimg.png" id="LOGO" ></td>
	</tr>
	</table>
	<br/><br/>
	</div>
	<?php include("head.php"); ?>
	<div id ="main"><br/><br/><br/>
	Le Mot clés a été ajoutter<br/>
	Voulez vous ajouter d'autres mots clés <a href ="ajout_keyword.php?N_inven=<?php echo $_GET['N_inven'] ; ?>"> ICI</a> ou <a href ="gest_ouvrage.php">QUITTER</a>
	</div><?php include("foot.php"); ?></body>
</html> 