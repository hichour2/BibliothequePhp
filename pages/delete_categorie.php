<?php
try
{
	// On se connecte � MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=BIBLIO', 'root', '');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arr�te tout
        die('Erreur : '.$e->getMessage());
}
$req = $bdd->prepare('DELETE FROM categorie WHERE ID_theme= ?');
$req->execute(array($_GET['ID_theme1']));
$req->closeCursor();
 header('Location: gest_categorie.php');
?>