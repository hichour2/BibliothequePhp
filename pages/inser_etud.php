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
$req = $bdd->prepare('INSERT INTO etudiant (N_CIN,nom,prenom,date_fin_stage) VALUES(:N_CIN,:nom,:prenom,:date_fin_stage)');
$req->execute(array('N_CIN' => $_POST['CIN'],
'nom'=> $_POST['name'],
'prenom'=> $_POST['prename'],
'date_fin_stage'=> $_POST['date_stage']
));
$req->closeCursor();
 header('Location: gest_etudiant.php');
?>