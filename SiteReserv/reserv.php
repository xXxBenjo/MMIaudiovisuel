
<?php
if(isset($_POST['ok']) && !empty($_POST['nom']) && !empty($_POST['prenom'])&& !empty($_POST['mail'])&& !empty($_POST['raison']))
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
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $raison = $id_connex->quote($_POST['raison']);
    $date=$_POST['date'];
    $id_mat = $_POST['id_mat'];
    // Préparation de la requête SQL
    $reponse1=$id_connex->prepare("SELECT * FROM utilisateur WHERE mail= ?");
    // Exécution de la requête
    $reponse1->execute(array($mail));
    $ligne=$reponse1->fetch(PDO::FETCH_BOTH);
    $id_utilisateur = $ligne[0];
    if (!$ligne)	// Le client n'existe pas
    {
    header("Location: FicheReserv.php");
    }
    $reponse1->closeCursor();	// Termine le traitement de la requête
    $id_connex=null;
    //deuxieme requetre////


  

    // ajout emprunt dans bdd
    try
    {
    $id_connex = new PDO('mysql:host=localhost;dbname=PTUT', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    }
    catch(PDOException $e)
    {
    die('Erreur : '.$e->getMessage());
    }
    // vérification date //:::::::::::::::::::::
    $date_verif=explode('/',$date);

    //echo round((time()-mktime(0,0,0,$date[1],$date[0],$date[2]))/(60*60*24));

    $time_now=time();
    $time_date=mktime(0,0,0,$date_verif[1],$date_verif[0],$date_verif[2]);
    $time_verif=$time_now-$time_date;
    if ($time_verif > 0)
    {
    echo "La date choisi n'est pas valide";
    }// vérification date //::::::::::::::::::::
    else
    {
    //vérification disponibilité//---------------------------------------------
    // Préparation de la requête SQL
    $reponse4=$id_connex->prepare("SELECT * FROM location WHERE id_mat= ? AND date_emprunt= ? ");
    // Exécution de la requête
    $reponse4->execute(array($id_mat, $date));
    $ligne=$reponse4->fetch(PDO::FETCH_BOTH);
    if (!$ligne)// si aucune location n'a été faite
    {
        try
        {
        $id_connex = new PDO('mysql:host=localhost;dbname=PTUT', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        }
        catch(PDOException $e)
        {
        die('Erreur : '.$e->getMessage());
        }
        $date = $id_connex->quote($date);
        $reponse3="INSERT INTO location VALUE (NULL, $id_utilisateur, $id_mat, $date, $raison)";
        $resultat2 = $id_connex->exec($reponse3);
        var_dump($reponse3);
        if ($resultat2 !=1)
        {
        echo "Un problème a eu lieu <br>";
        echo '<a href="javascript:history.back()">Retour</a>';
        }
        header('Location: Final.php');
        $id_connex=null;
    }
    else
    {
        echo "Ce matériel n'est pas disponible à la date choisie <br>";
        echo '<a href="javascript:history.back()">Retour</a>';
    }
    $id_connex=null;
    //vérification disponibilité//----------------------------------------------------
    
    }
}
else
{
    echo "Le formulaire n'a pas été correctement rempli <br>";
    echo '<a href="javascript:history.back()">Retour</a>';
}
?>