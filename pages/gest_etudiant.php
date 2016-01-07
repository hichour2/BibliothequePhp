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
	<div id ="main" > 	<br/><br/>
		<h3>Gestion des Etudiant</h3><br/><br/>
	<table align="center" width="800">
	<tr align="center">
	<td >
	<a href="ajout_etudiant.php" ><img src ="../IMG/add.png" width="80" height ="80">
	<h6 align="center">Ajouter<br/>Etudiant</h6></a>
	</td>
	<td >
	<a href="search_etudiant.php" ><img src ="../IMG/modif.png" width="80" height ="80">
	<h6 align="center">Modifier<br/>Etudiant</h6></a>
	</td>
	<td >
	<a href="search_etudiant.php" ><img src ="../IMG/delete.png" width="80" height ="80">
	<h6 align="center">Suprimer<br/>Etudiant</h6></a>
	</td>
	</tr>
	</table>
	</div><?php include("foot.php"); ?></body>
</html> 