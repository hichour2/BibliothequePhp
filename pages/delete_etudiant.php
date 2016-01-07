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
$req = $bdd->prepare('DELETE FROM etudiant WHERE N_CIN= ?');
$req->execute(array($_GET['N_CIN1']));
$req->closeCursor();
 header('Location: gest_etudiant.php');
?>