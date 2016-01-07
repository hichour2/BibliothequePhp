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
$req = $bdd->prepare('INSERT INTO foncionnaire (N_ordre,nom_fonctionaire,prenom_fonctionaire,affectation,fonction) VALUES(:N_ordre,:nom_fonctionaire,:prenom_fonctionaire,:affectation,:fonction)');
$req->execute(array('N_ordre' => $_POST['N_ord'],
'nom_fonctionaire'=> $_POST['name'],
'prenom_fonctionaire'=> $_POST['prename'],
'affectation'=> $_POST['service'],
'fonction'=> $_POST['function']
));
$req->closeCursor();
 header('Location: gest_fonctionnaire.php');
?>