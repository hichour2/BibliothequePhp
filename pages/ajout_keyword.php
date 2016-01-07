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
	<div id ="main"><br/>
	<h3>Ajouter Un mot clés</h3>
	<form method ="post" action ="inser_keyword.php?N_inven=<?php echo $_GET['N_inven'] ; ?>">
	<p>
	<table class="ajout">
	<tr><td><label for="keyword1"> mot clés  </label></td><td><input type="text" name="keyword1" id="keyword1" tabindex ="10"/></td></tr>
	<tr align ="right"><td><input type="submit" value="Inserer" tabindex ="40"/></td>
	<td><a href ="gest_ouvrage.php">Fini ?</a></td>
	</tr>
	</table>
	</p>
	</form>
	</div><?php include("foot.php"); ?></body>
</html> 