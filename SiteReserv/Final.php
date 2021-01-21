<?php
    try
    {
    $id_connex = new PDO('mysql:host=localhost;dbname=PTUT', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    }
    catch(PDOException $e)
    {
    die('Erreur : '.$e->getMessage());
    }
    $reponse1=$id_connex->query("SELECT date_emprunt FROM location ORDER BY id_loc DESC LIMIT 1");
    
    while($ligne=$reponse1->fetch(PDO::FETCH_BOTH))
    {
        $date = $ligne[0];
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" media="screen and (min-width: 1200px)" href="style/Final.css">
    <link rel="stylesheet" media="screen and (max-width: 1200px)" href="style/telfinal.css">
    <title>Site de Réservation IUT de Mulhouse</title>
</head>
<body>
    <header>
        <img src="img/mmi-1.png" id="logo"> <img src="img/1x/Fichier 1.png" id="logo3"> <p id="nom">Nom-Prénom</p>
    </header>
    <div class="main">
        <div class="reser">
            <h2> C'est réservé !</h2>
            <p>Vous pouvez récupérer le matériel mis à votre <br> disposition le <?php echo $date ;?> entre 12h et 13h30 <br> auprès d'un enseignant réfèrant.</p>
            <br> <br> <input type="button" value="Retour à l'accueil" onclick="goValid()">
        </div>
    </div>
    <script src="js/script.js"></script>
</body>
</html>