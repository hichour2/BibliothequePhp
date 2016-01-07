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
if($_GET['type']=="etud")
{
$req = $bdd->prepare('DELETE FROM emprunter_e WHERE ID_emprunt_e= ?');
$req->execute(array($_GET['ID_emprunt_e1']));
$req->closeCursor();
}
else if($_GET['type']=="fonct")
{
$req = $bdd->prepare('DELETE FROM emprunter_f WHERE ID_emprunt_f= ?');
$req->execute(array($_GET['ID_emprunt_f1']));
$req->closeCursor();
}
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
	<div id ="menu"><br/>
	<h3>Rendre un Ouvrage</h3>
	<p>
<a href ="../index.php">HOME</a><a href ="liste_emprunt.php">Liste des empruntes</a><a href ="liste_retard.php">Liste des retardier </a> </p>
	<br/><br/>
	L'ouvrage a été rendu <br/><br/>
	</div><?php include("foot.php"); ?></body>
</html> 