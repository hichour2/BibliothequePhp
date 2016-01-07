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
$req = $bdd->prepare('DELETE FROM ouvrages WHERE ID_ouvrages= ?');
$req->execute(array($_GET['ID_ouvrages1']));
$req->closeCursor();
 header('Location: gest_ouvrage.php');
?>