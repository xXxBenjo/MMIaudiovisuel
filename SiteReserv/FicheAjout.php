<?php
// retour au formulaire de saisie de code
if(isset($_POST['ok']) && !empty($_POST['nom']) && !empty($_POST['caté']) && !empty($_POST['nombre']) && !empty($_POST['emplacement']))
{
  try
  {
    $id_connex = new PDO('mysql:host=localhost;dbname=PTUT', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
  }
  catch(PDOException $e)
  {
    die('Erreur : '.$e->getMessage());
  }
  $image_mat='';
  $remarque = $_POST['remarque'];
  if (empty($_POST['remarque']))
  {
    $remarque = '';
  }
  $nom=$id_connex->quote($_POST['nom']);
  $categorie=$id_connex->quote($_POST['caté']);
  $nombre = $_POST['nombre'];
  $emplacement =$id_connex->quote($_POST['emplacement']);
  $remarque = $id_connex->quote($remarque);
  $image_mat = $id_connex->quote($image_mat);


  // Préparation de la requête SQL
  $reponse1="INSERT INTO materiela VALUE (NULL, $nom, $categorie, $emplacement, $remarque, $image_mat)";
  // Exécution de la requête
  for ($i=1; $i<=$nombre; $i++)
  {
      $resultat1=$id_connex->exec($reponse1);
  }
  if ($resultat1 != 1)
  {
    header("Location : FicheAjout.html");
  }
  else
  {
    header("Location: FinalAjout.html");
  }
  $id_connex=null;
}
else
{
  header("Location: FicheAjout.html");
}



?>