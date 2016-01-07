
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
$req = $bdd->prepare('UPDATE ouvrages SET N_inventaire=:N_inventaire ,titre=:titre, edition =:edition, auteur = :auteur ,date_de_sortie=:date_de_sortie ,nombre_exemplaire=:nombre_exemplaire, N_range=:N_range ,type =:type ,ID_theme=:ID_theme WHERE ID_ouvrages=:ID_ouvrages');
$req->execute(array(
'N_inventaire' => $_POST['N_inven'],
'titre'=> $_POST['title'],
'edition'=> $_POST['edit'],
'auteur'=> $_POST['writer'],
'date_de_sortie'=> $_POST['date_sortie'],
'nombre_exemplaire'=> $_POST['nombre_exemple'],
'N_range'=> $_POST['num_rang'],
'type'=> $_POST['type1'],
'ID_theme'=> $theme['ID_theme'],
'ID_ouvrages' => $_GET['ID_ouvrages1']
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
	<div id ="main" > 	<br/><br/><br/><br/>
	<p>l'Ouvrage a été modifié avec succées</p>
	</div><?php include("foot.php"); ?></body>
</html>