<?php
$id_mat = $_GET['id_mat'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/ficheAjout.css">
    <link rel="stylesheet" href="jquery-ui.css">
    <title>Site de Réservation IUT de Mulhouse</title>
</head>
<body>
    <header>
        <img src="img/mmi-1.png" id="logo"> <img src="img/1x/Fichier 1.png" id="logo3"> <p id="nom">Nom-Prénom</p>
    </header>
    <div class="fiche">
        <h1>Vous souhaitez réserver du matériel</h1> <br>
        <form action='reserv.php' method='post'>
        <div>Nom: <input type="text" name="nom"><br> <br></div> 
        <div>Prénom: <input type="text" name="prenom"> <br> <br></div>
        <div>Mail UHA: <input type="text" name="mail"> <br> <br></div>
            <div>Raison de l'emprunt :
                <input type="text" name="raison" size='50px'>
                <br> <br></div>
                date <input type="text" id="datepicker" name="date"><br>
                <input type='hidden' name='id_mat' value='<?php echo $id_mat ;?>'>
            <input type="submit" value="Confimer" id='valid' name='ok'>
        </form>
    </div>
    <script src="js/script.js"></script>
    <script src="jquery.js"></script>
<script src="jquery-ui.js"></script>
<script src="calendrier.js"></script>
</body>
</html>