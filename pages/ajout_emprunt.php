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
	<tr ><td class="entete_search"></td></tr>
	<tr><td class="cor_search">
	<h3>Emprunter un livre</h3>
	<?php
	if ( $_GET['disp']==0)
	{
	echo " Il n'existe plus d'exemplaire de cet ouvrages dans la bibliotheque " ;
	?>
	<br/>
	<?php 
	echo "veuillez attendre qu'un eprunteur rend ce livre ";
	?>
	<br/>
    <p><a href ="../index.php">HOME</a> </p>
	<?php
	}
	else
	{
	?>
	<form method ="post" action ="inser_emprunt.php?ID_ouvrages1=<?php echo $_GET['ID_ouvrages1'];?>">
	<p>
	<fieldset>
	<legend align="left">Vos coordonnées</legend>
	<table >
	<tr><td><input type="radio" name="type" value="student" id="student" tabindex ="5"/></td><td align="left"> <label for="student">Etudiant</label><br />
	<tr><td><input type="radio" name="type" value="fonct" id="fonct" tabindex ="10"checked="checked"/></td><td align="left" > <label for="fonct">Fonctionnaire</label><br />
	<tr><td><br/><label for="ident"> Identifiant </label></td><td><br/><input type="text" name="ident" id="ident" tabindex ="15"/></td></tr>
	<tr><td></td><td class="description" > * <strong style=" text-decoration: underline">NB</strong> : <br/> - Identifiant pour fonctionnaire : <strong> N ordre </strong>;<br/> - Identifiant pour etudiant :<strong> CIN </strong>;</td></tr>
	</table>
	</fieldset>
	<fieldset>
	<legend align="left">Dates</legend>
	<table>
	<tr><td><br/><label for="date_pret"> Date de pret  </label></td><td><br/><input type="text" name="date_pret" id="date_pret" value ="ANNE-MOIS-JOUR"tabindex ="20"/></td></tr>
	<tr><td><label for="date_retour"> date prevus de retour </label></td><td><input type="text" name="date_retour" id="date_retour"value ="ANNE-MOIS-JOUR" tabindex ="25"/></td></tr>
	</table>
	</fieldset>
	<table align ="center">
	<tr>
	<td><input type="submit" value="Ajouter" tabindex ="40"/></td>
	<td><input type="reset" value="Effacer" tabindex ="50"/></td>
	</tr>
	</table>
	</p>
	</form>
	<?php
	}
	?>
	</td></tr>
	<tr><td class="pied_search"></td></tr>
	</table><?php include("foot.php"); ?></body>
</html> 