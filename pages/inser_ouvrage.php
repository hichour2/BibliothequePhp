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
$req1 =$bdd->prepare('SELECT * FROM categorie WHERE theme = ?');
$req1->execute(array($_POST['theme1']));
$theme =$req1->fetch();
$req = $bdd->prepare('INSERT INTO ouvrages(N_inventaire,titre,edition,auteur,date_de_sortie,nombre_exemplaire,N_range,disponibilite,type,ID_theme) VALUES(:N_inventaire,:titre,:edition,:auteur,:date_de_sortie,:nombre_exemplaire,:N_range,:disponibilite,:type,:ID_theme)');
$req->execute(array('N_inventaire' => $_POST['N_inven'],
'titre'=> $_POST['title'],
'edition'=> $_POST['edit'],
'auteur'=> $_POST['writer'],
'date_de_sortie'=> $_POST['date_sortie'],
'nombre_exemplaire'=> $_POST['nombre_exemple'],
'N_range'=> $_POST['num_rang'],
'disponibilite'=> '1',
'type'=> $_POST['type1'],
'ID_theme'=> $theme['ID_theme']
));
$req->closeCursor();
$req1->closeCursor();
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
	<div id ="main"><br/><br/>
	l'ouvrage a bien été ajoutter<br/>
	Voulez vous ajouter des mots clés <a href ="ajout_keyword.php?N_inven=<?php echo $_POST['N_inven'] ; ?>"> ICI</a> ou <a href ="gest_ouvrage.php">QUITTER</a>
	</div><?php include("foot.php"); ?></body>
</html> 