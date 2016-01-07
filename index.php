<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<title>Gestionnaire de bibliotheque</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<meta name="author" content="kchiriyassine" /> 
	<meta name="robots" content="index" />
	<link rel="stylesheet" media="screen" type="text/css" title="Style" href="style.css" />
</head>
<body>
<form  method="post" action ="pages/search.php">
<div id="en_tete">
	<table align ="center">
	<tr>
	<td><img src ="IMG/ormvam.png" id="LOGO" ></td>
	<td><img height = "150px" width ="550px" src ="IMG/gestimg.png" id="LOGO" ></td>
	</tr>
	</table>
	<br/><br/>
	</div>
		<ul id="topmenu">

        <li>
                <a href="index.php">Accueil</a>
        </li>
      
        <li>
                <a href="pages/retour.php">Rendre</a>
					<ul>
                        <li>
                                <a href="pages/liste_emprunt.php">Liste Emprunteur</a>
                        </li>
                        <li>
                                <a href="pages/liste_retard.php">Liste Retardier</a>
                        </li>               
					</ul>        
		</li>
        <li>
                <a href="pages/admin.php">Administration</a>
				<ul>
                        <li><a href="pages/gest_ouvrage.php">Gestion Ouvrage</a>
							<ul>
										<li><a href="pages/ajout_ouvrage.php">Ajouter un Ouvrage</a></li>
										<li><a href="pages/search_ouvrage.php">Modifier un Ouvrage</a></li>
										<li><a href="pages/search_ouvrage.php">Supprimer un Ouvrage</a></li>
							</ul>
						</li>
                        <li>
						<a href="pages/gest_categorie.php">Gestion des Catégorie</a>
						    <ul>
									<li><a href="pages/ajout_categorie.php">Ajouter une Catégorie</a></li>
									<li><a href="pages/search_categorie.php">Modifier une Catégorie</a></li>
									<li><a href="pages/search_categorie.php">Supprimer une Catégorie</a></li>
							</ul>
						</li>
									<li>
									<a href="pages/gest_fonctionnaire.php">Gestion des Fonctionaire</a>
									<ul>
										<li><a href="pages/ajout_fonctionnaire.php">Ajouter un Fonctionnaire</a></li>
										<li><a href="pages/search_fonctionnaire.php">Modifier un Fonctionnaire</a></li>
										<li><a href="pages/search_fonctionnaire.php">Supprimer un Fonctionnaire</a></li>
									</ul>
									</li>
									<li>
									<a href="pages/gest_etudiant.php">Gestion des Etudiant</a>
										<ul>
										<li><a href="pages/ajout_fonctionnaire.php">Ajouter un Etudiant</a></li>
										<li><a href="pages/search_fonctionnaire.php">Modifier un Etudiant</a></li>
										<li><a href="pages/pages/search_fonctionnaire.php">Supprimer un Etudiant</a></li>
										</ul>
									</li>
                </ul>
        </li>
   
	</ul>
	</div>
	<br/><br/>
<div id ="menu">
	</br>
	<h2>Bienvenue</h2>
	</br>
	<p>
	<label for="search"> Recherche : </label><input type="text" name="search" id="searh"tabindex ="5"/><input type="submit" value="Rechercher" tabindex ="55"/><br /></br>
	<table align="center" width="330px" cellspacing="0" >
							<tr><td class="haut_act">Recherché par :</td></tr>
							<tr >
								<td class="cor_act">
									<input type="radio" name="searchby" value="title" id="title" tabindex ="20"/> <label for="title">Titre</label><br />
									<input type="radio" name="searchby" value="categorie1" id="categorie1" tabindex ="10"/> <label for="categorie1">Catégorie</label><br />
									<input type="radio" name="searchby" value="auteur1" id="auteur1" tabindex ="30"/> <label for="auteur1">Auteur</label><br />
									<input type="radio" name="searchby" value="date" id="date" tabindex ="40"/> <label for="date">Date de sortie ( Journal )</label><br />
									<input type="radio" name="searchby" value="numero" id="numero" tabindex ="50"/> <label for="numero">Numéro Edition ( Journal )</label><br />
									<input type="radio" name="searchby" value="keyword1" id="keyword1" tabindex ="50" checked="checked"/> <label for="keyword1">Mots Clés </label><br />
								</td>
							</tr>
							<tr><td class="foot_act"></td></tr>
	</table>
	
	</p>
	
	</div>
	<div id ="pied">
	</div>
	 <div id="footer">
		<p><a href="index.php">Acceuil</a>   |   <a href="retour.php">Retour</a>   |   <a href="admin.php">Administration</a></p>
		 <div id="sous_footer">
		 Maroc © 2011 <a href="mailto:yassinekchiri@gmail.com">Kchiri Yassine</a>. 
		 </div>
	</form>
</html>