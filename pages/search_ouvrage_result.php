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
	<h3>Resultat de recherche</h3>
	<?php
	$ouvrages=$bdd->prepare('SELECT * FROM ouvrages WHERE titre=? LIMIT 0,4');
	$ouvrages->execute(array($_POST['titre1']));
	while ($ouvrages_items = $ouvrages->fetch())
	{
	?>
	<p>N_inventaire:
	<?php
     echo $ouvrages_items['N_inventaire'];?> <br/><br/>
	Titre :<?php
     echo $ouvrages_items['titre'];
	 ?>
	 <br/><br/>
	 <a href="modif_ouvrage.php?ID_ouvrages1=<?php echo $ouvrages_items['ID_ouvrages'];?>">   Modifier </a>
	    <a href="delete_ouvrage_validate.php?ID_ouvrages1=<?php echo $ouvrages_items['ID_ouvrages'];?>">   SUPRIMER </a>
	 <?php
	}
	?><br/>
	</p>
	
	</div><?php include("foot.php"); ?></body>
</html> 