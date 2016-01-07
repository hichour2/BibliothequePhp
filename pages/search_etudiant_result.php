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
	$etudiant=$bdd->prepare('SELECT * FROM etudiant WHERE N_CIN = ?');
	$etudiant->execute(array($_POST['CIN']));
	while ($etudiant_items = $etudiant->fetch())
	{
	?>
	<p >N° Ordre :
	<?php
     echo $etudiant_items['N_CIN'];?> <br/>
	Nom : <?php
     echo $etudiant_items['nom'];?><br/>
	Prenom : <?php
     echo $etudiant_items['prenom'];?> <br/>
	 <a href="modif_etudiant.php?N_CIN1=<?php echo $etudiant_items['N_CIN'];?>">   Modifier </a>
	    <a href="delete_etudiant_validate.php?N_CIN1=<?php echo $etudiant_items['N_CIN'];?>">   SUPRIMER </a>
	 <?php
	}
	?><br/>
	</p>
	
	</div><?php include("foot.php"); ?></body>
</html> 