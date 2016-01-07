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
$req = $bdd->prepare('DELETE FROM foncionnaire WHERE N_ordre= ?');
$req->execute(array($_GET['N_ordre1']));
$req->closeCursor();
 header('Location: gest_fonctionnaire.php');
?>