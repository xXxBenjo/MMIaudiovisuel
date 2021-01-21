// retour au formulaire de saisie de code
<?php
if(isset($_POST['ok']) && !empty($_POST['mdp']) && !empty($_POST['mail']))
{
    try
    {
    $id_connex = new PDO('mysql:host=localhost;dbname=PTUT', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    }
    catch(PDOException $e)
    {
    die('Erreur : '.$e->getMessage());
    }
    $mail=$_POST['mail'];
    $mdp=$_POST['mdp'];
    // Préparation de la requête SQL
    $reponse1=$id_connex->prepare("SELECT * FROM utilisateur WHERE mail=? AND mdp=?");
    // Exécution de la requête
    $reponse1->execute(array($mail, $mdp));
    $ligne=$reponse1->fetch(PDO::FETCH_BOTH);

    if (!$ligne)	// Le client n'existe pas
    {
        header("Location: connexion.html");
    }
    else
    {
        header("Location: Accueil.php");
    }

    $reponse1->closeCursor();	// Termine le traitement de la requête
    $id_connex=null;
}
else
{
    header("Location: connexion.html");
}
?>