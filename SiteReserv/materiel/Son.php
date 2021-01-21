<?php
try
{
  $id_connex = new PDO('mysql:host=localhost;dbname=PTUT', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}
catch(PDOException $e)
{
  die('Erreur : '.$e->getMessage());
}

// Préparation de la requête SQL
$reponse = $id_connex->query("SELECT * FROM materiela WHERE categorie='son'");

// Exécution de la requête
while($ligne=$reponse->fetch(PDO::FETCH_BOTH))
{
  $id_mat=$ligne['id_mat'];
  echo "<div class='mat' name='".$id_mat."'><a href='FicheReserv.php?id_mat=$id_mat'>".$ligne['designation'].'</a></div>';
}
$reponse->closeCursor();
$id_connex=null;
?>
</body>
</html>
