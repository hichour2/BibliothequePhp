
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
$req = $bdd->prepare('UPDATE foncionnaire SET nom_fonctionaire=:nom_fonctionaire, prenom_fonctionaire =:prenom_fonctionaire, affectation = :affectation ,fonction=:fonction WHERE N_ordre=:N_ordre');
$req->execute(array(
'nom_fonctionaire' => $_POST['name'],
'prenom_fonctionaire'=> $_POST['prename'],
'affectation'=> $_POST['service'],
'fonction'=> $_POST['function'],
'N_ordre'=> $_GET['N_ordre1']
));
$req->closeCursor();
 
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
	<div id ="main" > 	<br/><br/><br/><br/>
	<p>les données du Fonctionnaire ont été modifié avec succées</p>
	</div><?php include("foot.php"); ?></body>
</html>