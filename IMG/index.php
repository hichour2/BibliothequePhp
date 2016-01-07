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
<div id="en_tete">
	<table align ="center">
	<tr>
	<td><img src ="IMG/ormvam.png" id="LOGO" ></td>
	<td><img height = "100px" width ="450px" src ="IMG/gestimg.png" id="LOGO" ></td>
	</tr>
	</table>
	<br/><br/>
	</div>
		<ul id="topmenu">

        <li>
                <a href="index.php">Accueil</a>
        </li>
        
		<li>
                <a href="pages/emprunt.php">Emprunt</a>
                
        </li>
        <li>
                <a href="pages/retour.php">Retour</a>
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
	<div id ="menu" >
	<table align="center" width="800">
	<tr align="center">
	<td >
	<h3 align="center"> <a href="pages/emprunt.php"> Emprunt </a></h3>
	</td>
	<td>
	<h3 align="center"><a href="pages/retour.php"> Retour </a></h3>
	</td>
	</tr>
	<tr align="center">
	<td colspan="2" >
	<h3 align="center" ><a href="pages/admin.php"> Administration </a></h3>
	</td>
	</tr>
	</table>
	</div>
	<div id ="pied">
	</div>
	 <div id="footer">
		<p><a href="index.php">Acceuil</a> | <a href="emprunt.php">Emprunt</a> | <a href="retour.php">Retour</a> | <a href="admin.php">Administration</a></p>
		 <div id="sous_footer">
		 Maroc © 2011 <a href="mailto:yassinekchiri@gmail.com">Kchiri Yassine</a>. 
		 </div>
	</div><?php include("foot.php"); ?></body>
</html>