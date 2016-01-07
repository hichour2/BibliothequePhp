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
	$fonctionnaire=$bdd->prepare('SELECT * FROM foncionnaire WHERE N_ordre = ?');
	$fonctionnaire->execute(array($_POST['N_ord']));
	while ($fonctionnaire_items = $fonctionnaire->fetch())
	{
	?>
	<p >N° Ordre :
	<?php
     echo $fonctionnaire_items['N_ordre'];?> <br/>
	Nom : <?php
     echo $fonctionnaire_items['nom_fonctionaire'];?><br/>
	Prenom : <?php
     echo $fonctionnaire_items['prenom_fonctionaire'];?> <br/>
	 <a href="modif_fonctionnaire.php?N_ordre1=<?php echo $fonctionnaire_items['N_ordre'];?>">   Modifier </a>
	    <a href="delete_fonctionnaire_validate.php?N_ordre1=<?php echo $fonctionnaire_items['N_ordre'];?>">   SUPRIMER </a>
	 <?php
	}
	?><br/>
	</p>
	
	</div><?php include("foot.php"); ?></body>
</html> 