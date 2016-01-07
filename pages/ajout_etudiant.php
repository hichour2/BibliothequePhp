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
	
	<h3>Ajouter un Etudiant</h3><br/>
	<form method ="post" action ="inser_etud.php">
	<p>
	<table class="ajout">
	<tr><td><label for="CIN"> N° CIN</label></td><td><input type="text" name="CIN" id="CIN" tabindex ="5"/></td></tr>
	<tr><td><label for="name"> Nom </label></td><td><input type="text" name="name" id="name" tabindex ="10"/></td></tr>
	<tr><td><label for="prename"> Prenom </label></td><td><input type="text" name="prename" id="prename" tabindex ="11"/></td></tr>
	<tr><td><label for="date_stage">Date de fin de stage </label></td><td><input type="text" name="date_stage" id="date_stage" value="ANNE-MOIS-JOUR"tabindex ="15"/></td></tr>
	<tr>
	<td><input type="submit" value="Ajouter" tabindex ="40"/></td>
	<td><input type="reset" value="Effacer" tabindex ="50"/></td>
	</tr>
	</table>
	</p>
	</form>
	</div><?php include("foot.php"); ?></body>
</html> 