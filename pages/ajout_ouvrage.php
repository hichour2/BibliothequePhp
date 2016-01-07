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
	<h3>Ajouter un Ouvrage</h3>
	<form method ="post" action ="inser_ouvrage.php">
	<p>
	<table class="ajout">
	
	<tr><td><label for="N_inven"> N° d'inventaire</label></td><td><input type="text" name="N_inven" id="N_inven" tabindex ="5"/></td></tr>
	<tr><td><label for="title"> Titre du livre </label></td><td><input type="text" name="title" id="title" tabindex ="10"/></td></tr>
	<tr><td><label for="writer"> auteur </label></td><td><input type="text" name="writer" id="writer" tabindex ="11"/></td></tr>
	<tr><td><label for="edit"> edition </label></td><td><input type="text" name="edit" id="edit" tabindex ="15"/></td></tr>
	<tr><td><label for="date_sortie"> Date de sortie </label></td><td><input type="text" name="date_sortie" id="date_sortie" value="ANNE-MOIS-JOUR"tabindex ="17"/></td></tr>
	<tr><td><label for="nombre_exemple"> Nombre d'exemplaire </label></td><td><input type="text" name="nombre_exemple" id="nombre_exemple" tabindex ="20"/></td></tr>
	<tr><td><label for="num_rang"> N° de rangé </label></td><td><input type="text" name="num_rang" id="num_rang" tabindex ="25"/></td></tr>
	<tr><td><label for="theme1">Théme</label></td><td>
       <select name="theme1" id="theme1" tabindex ="30">
	<?php
	$theme=$bdd->query('SELECT * FROM categorie ');
	while ($theme_items = $theme->fetch())
	{
	?><option value="<?php echo $theme_items['theme'];?>"><?php echo $theme_items['theme'];?></option><?php
	}
	?>
	</select>
	</td></tr>
	<tr><td><label for="type1"> TYPE </label></td><td>
      <select name="type1" id="type1" tabindex ="35">
	<option value="livre">livre</option>
	<option value="dictionaire">dictionnaire</option>
	<option value="revue">revue</option>
	<option value="journal">journal</option>
	</select></td></tr>
	<tr>
	<td><input type="submit" value="Ajouter" tabindex ="40"/></td>
	<td><input type="reset" value="Effacer" tabindex ="40"/></td>
	</tr>
	</table>
	</p>
	</form>
	</div><?php include("foot.php"); ?></body>
</html> 