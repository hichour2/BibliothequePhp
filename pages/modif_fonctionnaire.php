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
	<h3>Modifier les informations<br/>d'un Fonctionnaire</h3>
	<?php
	$fonctionnaire=$bdd->prepare('SELECT * FROM foncionnaire WHERE N_ordre =?');
	$fonctionnaire->execute(array($_GET['N_ordre1']));
	$fonctionnaire_items = $fonctionnaire->fetch()
	?>
		<form method ="post" action ="update_fonctionnaire.php?N_ordre1=<?php echo $fonctionnaire_items['N_ordre'];?>">
	<p>
	<table class="ajout">
	<tr><td><label for="N_ord"> N° Ordre</label></td><td><?php echo $fonctionnaire_items['N_ordre'];?></td></tr>
	<tr><td><label for="name"> Nom </label></td><td><input type="text" name="name" id="name" value ="<?php echo $fonctionnaire_items['nom_fonctionaire'];?>"tabindex ="10"/></td></tr>
	<tr><td><label for="prename"> Prenom </label></td><td><input type="text" name="prename" id="prename" value ="<?php echo $fonctionnaire_items['prenom_fonctionaire'];?>"tabindex ="11"/></td></tr>
	<tr><td><label for="service">Affectation </label></td><td><input type="text" name="service" id="service" value ="<?php echo $fonctionnaire_items['affectation'];?>"tabindex ="15"/></td></tr>
	<tr><td><label for="function"> Fonction </label></td><td><input type="text" name="function" id="function" value ="<?php echo $fonctionnaire_items['fonction'];?>" tabindex ="17"/></td></tr>
	<tr>
	<td><input type="submit" value="Modifier" tabindex ="40"/></td>
	<td><input type="reset" value="Effacer" tabindex ="50"/></td>
	</tr>
	</table>
	</p>
	
	</div><?php include("foot.php"); ?></body>
</html> 