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
$verifie_student=1;
$verifie_fonct=1;
$dispo= 1 ;
$req5= $bdd->prepare('SELECT * FROM emprunter_e WHERE N_CIN=?');
$req5->execute(array($_POST['ident']));
while($verifie_etud=$req5->fetch())
{
if ( $verifie_etud['ID_ouvrage']==$_GET['ID_ouvrages1'])
{
$verifie_student=0;
}
}
$req6= $bdd->prepare('SELECT * FROM emprunter_f WHERE N_ordre=?');
$req6->execute(array($_POST['ident']));
while($verifie_fonc=$req6->fetch())
{
if ( $verifie_fonc['ID_ouvrage']==$_GET['ID_ouvrages1'])
{
$verifie_fonct=0;
}
}
$req3= $bdd->prepare('SELECT * FROM ouvrages WHERE ID_ouvrages=?');
$req3->execute(array($_GET['ID_ouvrages1']));
$ouvr=$req3->fetch();
$erreur=10;
$type=10;
if ($ouvr['disponibilite']==1)
{
$exictant=--$ouvr['nombre_existant'];
if($exictant==0)
{
$dispo= 0 ;
}
$req4 = $bdd->prepare('UPDATE ouvrages SET nombre_existant=:nombre_existant,disponibilite=:disponibilite WHERE ID_ouvrages=:ID_ouvrages');
$req4->execute(array(
'disponibilite' => $dispo,
'nombre_existant' => $exictant,
'ID_ouvrages' => $_GET['ID_ouvrages1']
));
if ( $_POST['type']=='student' && $verifie_student==1)
{
$req = $bdd->prepare('INSERT INTO emprunter_e (ID_ouvrage,N_CIN,date_de_pret,date_de_retour) VALUES(:ID_ouvrage,:N_CIN,:date_de_pret,:date_de_retour)');
$req->execute(array('ID_ouvrage' => $_GET['ID_ouvrages1'],
'N_CIN'=> $_POST['ident'],
'date_de_pret'=> $_POST['date_pret'],
'date_de_retour'=> $_POST['date_retour']
));
$req1 = $bdd->prepare('SELECT * FROM etudiant WHERE N_CIN = ?');
$req1->execute(array($_POST['ident']));
$usager=$req1->fetch();
$type=1;
if ($usager['N_CIN'] == $_POST['ident'])
{
$data=array($usager['N_CIN'],$usager['nom'],$usager['prenom'],$usager['date_fin_stage']);
$erreur=0;
}
else
{
$erreur=1;
}
$req->closeCursor();
}
else if ($_POST['type']=='fonct' && $verifie_fonct==1)
{
$req1 = $bdd->prepare('SELECT * FROM foncionnaire WHERE N_ordre=?');
$req1->execute(array($_POST['ident']));
$usager=$req1->fetch();
$req = $bdd->prepare('INSERT INTO emprunter_f (ID_ouvrage,N_ordre,date_de_pret,date_de_retour) VALUES(:ID_ouvrage,:N_ordre,:date_de_pret,:date_de_retour)');
$req->execute(array('ID_ouvrage' => $_GET['ID_ouvrages1'],
'N_ordre'=> $_POST['ident'],
'date_de_pret'=> $_POST['date_pret'],
'date_de_retour'=> $_POST['date_retour']
));

$type=2;
if ($usager['N_ordre']==$_POST['ident'])
{
$data=array($usager['N_ordre'],$usager['nom_fonctionaire'],$usager['prenom_fonctionaire'],$usager['affectation'],$usager['fonction']);
$erreur=0;
}
else
{
$erreur=1;
}
$req->closeCursor();
}
}
?>
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
	<div id ="menu"><br/>
	<?php 
	if($erreur == 0 && $type==1)
	{
	?>
	<p>L'emprunt a  été effectué par l'Etudiant : <?php echo $data[1]; ?>  <?php echo $data[2]; ?><br/> Ayant le N° CIN <?php echo $data[0]; ?><br/> Date de fin de stage :<?php echo $data[3]; ?></p>
	<?php 
	}
	else if ($erreur == 0 && $type==2)
	{
	?>
	<p>L'emprunt a  été effectué par le Fonctionnaire : <?php echo $data[1]; ?>  <?php echo $data[2]; ?> <br/> Ayant le N° ordre <?php echo $data[0]; ?><br/> Affecté au service : <?php echo $data[3]; ?> Occupant la fonction de : <?php echo $data[4]; ?></p>
	<?php 
	}
	else if($erreur == 1 && $type==1)
	{
	?>
	<p>Cet etudiant n'exicte pas encore dans la base de Données voullez vous l'ajouter ? <br/><br/><a href="ajout_etudiant.php">ICI</a></p>
	<?php 
	}
	else if($erreur == 1 && $type==2)
	{
	?>
	<p>Ce Fonctionnaire n'exicte pas encore dans la base de Données voullez vous l'ajouter ? <br/><br/><a href="ajout_fonctionnaire.php">ICI</a></p>
	<?php 
	}
	else if ($verifie_fonct==0 || $verifie_student==0)
	{
	?>
	<p>Cet usager a deja emprunter le meme ouvrage vous ne pouvez pas prendre un le meme  <br/><br/></p>
	<?php
	}
	else 
	{
	?>
	<p>SVP ressayer a nouveau votre requete a subbi des erreur MERCI <br/><br/><a href="ajout_emprunt.php?ID_ouvrages1=<?php echo $ouvr['ID_ouvrages'];?>&disp=<?php echo $ouvr['disponibilite'];?>">ICI</a></p>
	<?php 
	}
	?>
	<br/><br/>
<a href ="../index.php">HOME</a>   <br/><br/><br/>	<a href ="liste_emprunt.php">Liste des empruntes</a>      <a href ="liste_retard.php">Liste des retardier </a> 
	</div><?php include("foot.php"); ?></body>
</html> 