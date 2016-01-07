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
	<h3> Resultat de Recherche</h3>
	<?php
	$theme=$bdd->prepare('SELECT * FROM categorie WHERE theme=? LIMIT 0,4');
	$theme->execute(array($_POST['theme1']));
	while ($theme_items = $theme->fetch())
	{
	?>
	<p>
	Nom Theme : <?php
     echo $theme_items['theme'];
	 ?>
	 <br/><br/><br/>
	 <a href="modif_categorie.php?ID_theme1=<?php echo $theme_items['ID_theme'];?>">   Modifier </a>
	    <a href="delete_categorie_validate.php?ID_theme1=<?php echo $theme_items['ID_theme'];?>">   SUPRIMER </a>
	 <?php
	}
	?><br/>
	</p>
	
	</div><?php include("foot.php"); ?></body>
</html> 