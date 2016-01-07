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
<form  method="post" action ="search.php">
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
	<div id ="menu">
	</br>
	<h2>Rechercher</h2>
	</br>
	<p>
	<label for="search"> Recherche : </label><input type="text" name="search" id="searh"tabindex ="5"/></br>
	<table class="ajout" width="400px" cellspacing="0" >
							<tr><td class="haut_act">&nbsp;&nbsp;Recherché par :</td></tr>
							<tr >
								<td class="cor_act">
									<input type="radio" name="searchby" value="title" id="title" tabindex ="20"/> <label for="title">Titre</label><br />
									<input type="radio" name="searchby" value="categorie1" id="categorie1" tabindex ="10"/> <label for="categorie1">Catégorie</label><br />
									<input type="radio" name="searchby" value="auteur1" id="auteur1" tabindex ="30"/> <label for="auteur1">Auteur</label><br />
									<input type="radio" name="searchby" value="date" id="date" tabindex ="40"/> <label for="date">Date de sortie ( Journal )</label><br />
									<input type="radio" name="searchby" value="numero" id="numero" tabindex ="50"/> <label for="numero">Numéro Edition ( Journal )</label><br />
									<input type="radio" name="searchby" value="keyword1" id="keyword1" tabindex ="50" checked="checked"/> <label for="keyword1">Mots Clés </label><br />
									<input type="submit" value="Rechercher" /><br />
								</td>
							</tr>
							<tr><td class="foot_act"></td></tr>
	</table>
	
	</p>
	
	</div>
	
	</form>
	
<?php include("foot.php"); ?></body>
</html>