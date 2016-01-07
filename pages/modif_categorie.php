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
	<h3>Modifier un théme</h3>
	<?php
	$theme=$bdd->prepare('SELECT * FROM categorie WHERE ID_theme =?');
	$theme->execute(array($_GET['ID_theme1']));
	$theme_items = $theme->fetch()
	?>
	<form method ="post" action ="update_categorie.php?ID_theme1=<?php echo $theme_items['ID_theme'];?>">
	<p>
	<table class="ajout">
	
	<tr><td><label for="theme1"> Nom Theme </label></td><td><input type="text" name="theme1" id="theme1" value="<?php echo $theme_items['theme'];?>"tabindex ="5"/></td></tr>
	<tr>
	<td><input type="submit" value="Modifier" tabindex ="40"/></td>
	<td><input type="reset" value="Effacer" tabindex ="40"/></td>
	</tr>
	</table>
	</p>
	</form>
	</div><?php include("foot.php"); ?></body>
</html> 