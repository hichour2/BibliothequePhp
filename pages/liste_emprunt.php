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
	<table id ="search" >
	<tr ><td class="entete_search">
	</td></tr>
	<tr><td class="cor_search">
	<h3>Liste des Emprunts</h3>
	<table width ="800px" align="center">
	<tr><td>Fonctionnaire</td><td>Etudiant</td></tr>
	<tr> 
	<td>
	<?php
	$result1=$bdd->query('SELECT * FROM emprunter_f ORDER BY ID_emprunt_f DESC');
	?>
	<table class ="empruntlist" width ="400px">
	<tr><td> NOM </td><td> PRENOM </td><td> TITRE </td><td> Date de pret </td><td> Date prevu de retour </td></tr>
	<?php
	while($result1_items = $result1->fetch())
	{
	$ouvrage=$bdd->prepare('SELECT *FROM ouvrages WHERE ID_ouvrages=?');
	$ouvrage->execute(array($result1_items['ID_ouvrage']));
	$ouvrage_items=$ouvrage->fetch();
	$fonctionnaire=$bdd->prepare('SELECT *FROM foncionnaire WHERE N_ordre=?');
	$fonctionnaire->execute(array($result1_items['N_ordre']));
	$fonctionnaire_items=$fonctionnaire->fetch();
	?>
	<tr><td> <?php echo $fonctionnaire_items['nom_fonctionaire'];?> </td><td> <?php echo $fonctionnaire_items['prenom_fonctionaire'];?> </td><td> <?php echo $ouvrage_items['titre'];?> </td><td> <?php echo $result1_items['date_de_pret'];?> </td><td> <?php echo $result1_items['date_de_retour'];?>  </td> <td width ="35px"><a href="rendre.php?ID_emprunt_f1=<?php echo $result1_items['ID_emprunt_f'];?>&type=fonct"><img src="../IMG/rendre.png" alt ="rendre" name ="rendre"/><br/>rendre</a></td></tr>
	<?php
	}
	?>
	</table>
	</td>
	<td>
	<?php
	$result=$bdd->query('SELECT * FROM emprunter_e ORDER BY ID_emprunt_e DESC');
	?>
    <table class ="empruntlist" width ="400px">
	<tr><td> NOM </td><td> PRENOM </td><td> TITRE </td><td> Date de pret </td><td> Date prevu de retour </td></tr>
	<?php
	while($result_items = $result->fetch())
	{
	$ouvrage=$bdd->prepare('SELECT *FROM ouvrages WHERE ID_ouvrages=?');
	$ouvrage->execute(array($result_items['ID_ouvrage']));
	$ouvrage_items=$ouvrage->fetch();
	$etudiant=$bdd->prepare('SELECT *FROM etudiant WHERE N_CIN=?');
	$etudiant->execute(array($result_items['N_CIN']));
	$etudiant_items=$etudiant->fetch();
	?>
	<tr><td> <?php echo $etudiant_items['nom'];?> </td><td> <?php echo $etudiant_items['prenom'];?> </td><td> <?php echo $ouvrage_items['titre'];?> </td><td> <?php echo $result_items['date_de_pret'];?> </td><td> <?php echo $result_items['date_de_retour'];?>  </td> <td width ="35px"><a href="rendre.php?ID_emprunt_e1=<?php echo $result_items['ID_emprunt_e'];?>&type=etud"><img src="../IMG/rendre.png" alt ="rendre" name ="rendre"/><br/>rendre</a></td></tr>
	<?php
	}
	?>
	</table>
	</td>
	</tr>
	</table>
	</td></tr>
	<tr><td class="pied_search"></td></tr>
	</table>
	
<?php include("foot.php"); ?></body>
</html> 
