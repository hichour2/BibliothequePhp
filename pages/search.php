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
	<br/><br>
	</div>
		<?php include("head.php"); ?>
	<table id ="search" >
	<tr ><td class="entete_search"></td></tr>
	<tr><td class="cor_search">
	<h3>Resultat de Recherche des Ouvrages</h3><br/>
	<?php
	if ($_POST['searchby']== "title")
	{
	$result=$bdd->prepare('SELECT * FROM ouvrages WHERE titre = ?');
	$result->execute(array($_POST['search']));
	while($result_items = $result->fetch())
	{
	?><br/>
	<div class ="searchresult" ><br/><br/><br/><p>
	<table width="620px">
   <tr>
       <td rowspan="3" align="center"><img src="../IMG/<?php echo $result_items['type'];?>.png" width="80px" height="80px"/></td>
	   <td>N d'inventaire : <?php echo $result_items['N_inventaire'];?> </td>
	   <td>Titre : <?php echo $result_items['titre'];?></td>
	   <td>Auteur :  <?php echo $result_items['auteur'];?></td>
   </tr>
   <tr>
       <td>Date de sortie : <?php echo $result_items['date_de_sortie'];?></td>
       <td>Edition : <?php echo $result_items['edition'];?></td>
       <td>Theme : <?php
	 $req2 =$bdd->prepare('SELECT * FROM categorie WHERE ID_theme = ?');
$req2->execute(array($result_items['ID_theme']));
$theme2=$req2->fetch();
echo $theme2['theme'];
?></td>
   </tr>
    <tr>
       <td>Numero range : <?php echo $result_items['N_range'];?></td>
       <td colspan="2">Nombre exemplaire :  <?php echo $result_items['nombre_exemplaire'];?></td>
   </tr>
   <tr>
   <td align="center"><?php echo $result_items['type'];?></td >
   <td >Disponibilité : </td>
   <td colspan="2"><?php
if ($result_items['disponibilite'] == 1)
{
echo " Cet ouvrage est disponible ";
}
else
{
echo " Cet ouvrage n'est pas disponible pour le moments ";
}
?></td></tr>
<tr><td class ="lienep"colspan="2"align="center"><br/><br/><a href ="ajout_emprunt.php?ID_ouvrages1=<?php echo $result_items['ID_ouvrages'];?>&disp=<?php echo $result_items['disponibilite'];?> ">Emprunter</a></td></tr>
</table>
	</p>
	</div>
	<?php
	}
	}
	else 	if ($_POST['searchby']== "categorie1")
	{
	$req1 =$bdd->prepare('SELECT * FROM categorie WHERE theme = ?');
$req1->execute(array($_POST['search']));
$theme =$req1->fetch();
	$result=$bdd->prepare('SELECT * FROM ouvrages WHERE ID_theme = ?');
	$result->execute(array($theme['ID_theme']));
	while($result_items = $result->fetch())
	{
	?><br/>
	<div class ="searchresult" ><br/><br/><br/><p>
	<table width="620px">
   <tr>
       <td rowspan="3" align="center"><img src="../IMG/<?php echo $result_items['type'];?>.png" width="80px" height="80px"/></td>
	   <td>N d'inventaire : <?php echo $result_items['N_inventaire'];?> </td>
	   <td>Titre : <?php echo $result_items['titre'];?></td>
	   <td>Auteur :  <?php echo $result_items['auteur'];?></td>
   </tr>
   <tr>
       <td>Date de sortie : <?php echo $result_items['date_de_sortie'];?></td>
       <td>Edition : <?php echo $result_items['edition'];?></td>
       <td>Theme : <?php
	 $req2 =$bdd->prepare('SELECT * FROM categorie WHERE ID_theme = ?');
$req2->execute(array($result_items['ID_theme']));
$theme2=$req2->fetch();
echo $theme2['theme'];
?></td>
   </tr>
    <tr>
       <td>Numero range : <?php echo $result_items['N_range'];?></td>
       <td colspan="2">Nombre exemplaire :  <?php echo $result_items['nombre_exemplaire'];?></td>
   </tr>
   <tr>
   <td align="center"><?php echo $result_items['type'];?></td >
   <td >Disponibilité : </td>
   <td colspan="2"><?php
if ($result_items['disponibilite'] == 1)
{
echo " Cet ouvrage est disponible ";
}
else
{
echo " Cet ouvrage n'est pas disponible pour le moments ";
}
?></td></tr>
<tr><td class ="lienep"colspan="2"align="center"><br/><br/><a href ="ajout_emprunt.php?ID_ouvrages1=<?php echo $result_items['ID_ouvrages'];?>&disp=<?php echo $result_items['disponibilite'];?> ">Emprunter</a></td></tr>
</table>
	</p>
	</div>
	<?php
	}
	}
	else if ($_POST['searchby']== "auteur1")
	{
	$result=$bdd->prepare('SELECT * FROM ouvrages WHERE auteur = ?');
	$result->execute(array($_POST['search']));
	while($result_items = $result->fetch())
	{
	?><br/>
	<div class ="searchresult" ><br/><br/><br/><p>
	<table width="620px">
   <tr>
       <td rowspan="3" align="center"><img src="../IMG/<?php echo $result_items['type'];?>.png" width="80px" height="80px"/></td>
	   <td>N d'inventaire : <?php echo $result_items['N_inventaire'];?> </td>
	   <td>Titre : <?php echo $result_items['titre'];?></td>
	   <td>Auteur :  <?php echo $result_items['auteur'];?></td>
   </tr>
   <tr>
       <td>Date de sortie : <?php echo $result_items['date_de_sortie'];?></td>
       <td>Edition : <?php echo $result_items['edition'];?></td>
       <td>Theme : <?php
	 $req2 =$bdd->prepare('SELECT * FROM categorie WHERE ID_theme = ?');
$req2->execute(array($result_items['ID_theme']));
$theme2=$req2->fetch();
echo $theme2['theme'];
?></td>
   </tr>
    <tr>
       <td>Numero range : <?php echo $result_items['N_range'];?></td>
       <td colspan="2">Nombre exemplaire :  <?php echo $result_items['nombre_exemplaire'];?></td>
   </tr>
   <tr>
   <td align="center"><?php echo $result_items['type'];?></td >
   <td >Disponibilité : </td>
   <td colspan="2"><?php
if ($result_items['disponibilite'] == 1)
{
echo " Cet ouvrage est disponible ";
}
else
{
echo " Cet ouvrage n'est pas disponible pour le moments ";
}
?></td></tr>
<tr><td class ="lienep"colspan="2"align="center"><br/><br/><a href ="ajout_emprunt.php?ID_ouvrages1=<?php echo $result_items['ID_ouvrages'];?>&disp=<?php echo $result_items['disponibilite'];?> ">Emprunter</a></td></tr>
</table>
	</p>
	</div>
	<?php
	}
	}
	else if ($_POST['searchby']== "date")
	{
	$result=$bdd->prepare('SELECT * FROM ouvrages WHERE date_de_sortie = ?');
	$result->execute(array($_POST['search']));
	while($result_items = $result->fetch())
	{
	?><br/>
	<div class ="searchresult" ><br/><br/><br/><p>
	<table width="620px">
   <tr>
       <td rowspan="3" align="center"><img src="../IMG/<?php echo $result_items['type'];?>.png" width="80px" height="80px"/></td>
	   <td>N d'inventaire : <?php echo $result_items['N_inventaire'];?> </td>
	   <td>Titre : <?php echo $result_items['titre'];?></td>
	   <td>Auteur :  <?php echo $result_items['auteur'];?></td>
   </tr>
   <tr>
       <td>Date de sortie : <?php echo $result_items['date_de_sortie'];?></td>
       <td>Edition : <?php echo $result_items['edition'];?></td>
       <td>Theme : <?php
	 $req2 =$bdd->prepare('SELECT * FROM categorie WHERE ID_theme = ?');
$req2->execute(array($result_items['ID_theme']));
$theme2=$req2->fetch();
echo $theme2['theme'];
?></td>
   </tr>
    <tr>
       <td>Numero range : <?php echo $result_items['N_range'];?></td>
       <td colspan="2">Nombre exemplaire :  <?php echo $result_items['nombre_exemplaire'];?></td>
   </tr>
   <tr>
   <td align="center"><?php echo $result_items['type'];?></td >
   <td >Disponibilité : </td>
   <td colspan="2"><?php
if ($result_items['disponibilite'] == 1)
{
echo " Cet ouvrage est disponible ";
}
else
{
echo " Cet ouvrage n'est pas disponible pour le moments ";
}
?></td></tr>
<tr><td class ="lienep"colspan="2"align="center"><br/><br/><a href ="ajout_emprunt.php?ID_ouvrages1=<?php echo $result_items['ID_ouvrages'];?>&disp=<?php echo $result_items['disponibilite'];?> ">Emprunter</a></td></tr>
</table>
	</p>
	</div>
	<?php
	}
	
	}
	else if ($_POST['searchby']== "numero")
	{
	$result=$bdd->prepare('SELECT * FROM ouvrages WHERE edition = ?');
	$result->execute(array($_POST['search']));
	while($result_items = $result->fetch())
	{
	?><br/>
	<div class ="searchresult" ><br/><br/><br/><p>
	<table width="620px">
   <tr>
       <td rowspan="3" align="center"><img src="../IMG/<?php echo $result_items['type'];?>.png" width="80px" height="80px"/></td>
	   <td>N d'inventaire : <?php echo $result_items['N_inventaire'];?> </td>
	   <td>Titre : <?php echo $result_items['titre'];?></td>
	   <td>Auteur :  <?php echo $result_items['auteur'];?></td>
   </tr>
   <tr>
       <td>Date de sortie : <?php echo $result_items['date_de_sortie'];?></td>
       <td>Edition : <?php echo $result_items['edition'];?></td>
       <td>Theme : <?php
	 $req2 =$bdd->prepare('SELECT * FROM categorie WHERE ID_theme = ?');
$req2->execute(array($result_items['ID_theme']));
$theme2=$req2->fetch();
echo $theme2['theme'];
?></td>
   </tr>
    <tr>
       <td>Numero range : <?php echo $result_items['N_range'];?></td>
       <td colspan="2">Nombre exemplaire :  <?php echo $result_items['nombre_exemplaire'];?></td>
   </tr>
   <tr>
   <td align="center"><?php echo $result_items['type'];?></td >
   <td >Disponibilité : </td>
   <td colspan="2"><?php
if ($result_items['disponibilite'] == 1)
{
echo " Cet ouvrage est disponible ";
}
else
{
echo " Cet ouvrage n'est pas disponible pour le moments ";
}
?></td></tr>
<tr><td class ="lienep"colspan="2"align="center"><br/><br/><a href ="ajout_emprunt.php?ID_ouvrages1=<?php echo $result_items['ID_ouvrages'];?>&disp=<?php echo $result_items['disponibilite'];?> ">Emprunter</a></td></tr>
</table>
	</p>
	</div>
	<?php
	}
	}
	else if ($_POST['searchby']== "keyword1")
	{
	$req1 =$bdd->prepare('SELECT * FROM keywords WHERE keyword = ?');
$req1->execute(array($_POST['search']));
while( $key=$req1->fetch())
{
	$result=$bdd->prepare('SELECT * FROM ouvrages WHERE ID_ouvrages = ?');
	$result->execute(array($key['ID_ouvrages']));
	$result_items = $result->fetch()
	?><br/>
	<div class ="searchresult" ><br/><br/><br/><p>
	<table width="620px">
   <tr>
       <td rowspan="3" align="center"><img src="../IMG/<?php echo $result_items['type'];?>.png" width="80px" height="80px"/></td>
	   <td>N d'inventaire : <?php echo $result_items['N_inventaire'];?> </td>
	   <td>Titre : <?php echo $result_items['titre'];?></td>
	   <td>Auteur :  <?php echo $result_items['auteur'];?></td>
   </tr>
   <tr>
       <td>Date de sortie : <?php echo $result_items['date_de_sortie'];?></td>
       <td>Edition : <?php echo $result_items['edition'];?></td>
       <td>Theme : <?php
	 $req2 =$bdd->prepare('SELECT * FROM categorie WHERE ID_theme = ?');
$req2->execute(array($result_items['ID_theme']));
$theme2=$req2->fetch();
echo $theme2['theme'];
?></td>
   </tr>
    <tr>
       <td>Numero range : <?php echo $result_items['N_range'];?></td>
       <td colspan="2">Nombre exemplaire :  <?php echo $result_items['nombre_exemplaire'];?></td>
   </tr>
   <tr>
   <td align="center"><?php echo $result_items['type'];?></td >
   <td >Disponibilité : </td>
   <td colspan="2"><?php
if ($result_items['disponibilite'] == 1)
{
echo " Cet ouvrage est disponible ";
}
else
{
echo " Cet ouvrage n'est pas disponible pour le moments ";
}
?></td></tr>
<tr><td class ="lienep"colspan="2"align="center"><br/><br/><a href ="ajout_emprunt.php?ID_ouvrages1=<?php echo $result_items['ID_ouvrages'];?>&disp=<?php echo $result_items['disponibilite'];?> ">Emprunter</a></td></tr>
</table>

	</p>
	</div>
	<?php
	
}
}
else
{
echo " Erreur de demande SVP ressayer";
}
	?>
	</td></tr>
	<tr><td class="pied_search"></td></tr>
	</table>
<?php include("foot.php"); ?></body>
</html> 
