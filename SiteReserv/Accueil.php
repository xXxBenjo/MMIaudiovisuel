<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" media="screen and (min-width: 1200px)" href="style/Accueil.css">
    <link rel="stylesheet" media="screen and (max-width: 1200px)" href="style/telAccueil.css">
    <title>Site de Réservation IUT de Mulhouse</title>
</head>
<body>
    <header>
        <img src="img/mmi-1.png" id="logo"> <img src="img/1x/Fichier 1.png" id="logo3"> <p id="nom">Nom-Prénom</p>
    </header>
    <input type='button' class='ajout' onclick='goAjout()' value='Ajouter du matériel audiovisuel'>
    <form action='<?php echo $_SERVER["PHP_SELF"]?>' method='post'>
        <div class="liste">
            <input type="button" value="Caméras" name="cam">
            <input type="button" value="Son" name="son">
            <input type="button" value="Lumières" name="lum">
            <input type="button" value="Appareils photos" name="app">
            <input type="button" value="Accessoires" name="acc">
        </div>
        <div class="matos" name='materiel'>

        </div>
        
</form>
    
    <script src="jquery.js"></script>
    <script src="jquery-ui.js"></script>
    <script src="js/script.js"></script>
<script>
$(document).ready()
{
    $(':input[name="cam"]').click(function(){
        $('.matos').empty();
        $(':input').not(':input[name="cam"]').removeClass('bordurebasse');
        $(':input[name="cam"]').addClass('bordurebasse');
        $.post('materiel/Camera.php', function(data)
        {
            $('.matos').html(data);
        });
    });
    $(':input[name="son"]').click(function(){
        $('.matos').empty();
        $(':input').not(':input[name="son"]').removeClass('bordurebasse');
        $(':input[name="son"]').addClass('bordurebasse');
        $.post('materiel/Son.php', function(data)
        {
            $('.matos').html(data);
        });
    });
    $(':input[name="lum"]').click(function(){
        $('.matos').empty();
        $(':input').not(':input[name="lum"]').removeClass('bordurebasse');
        $(':input[name="lum"]').addClass('bordurebasse');
        $.post('materiel/Lumiere.php', function(data)
        {
            $('.matos').html(data);
        });
    });
    $(':input[name="app"]').click(function(){
        $('.matos').empty();
        $(':input').not(':input[name="app"]').removeClass('bordurebasse');
        $(':input[name="app"]').addClass('bordurebasse');
        $.post('materiel/AppPhoto.php', function(data)
        {
            $('.matos').html(data);
        });
    });
    $(':input[name="acc"]').click(function(){
        $('.matos').empty();
        $(':input').not(':input[name="acc"]').removeClass('bordurebasse');
        $(':input[name="acc"]').addClass('bordurebasse');
        $.post('materiel/accessoire.php', function(data)
        {
            $('.matos').html(data);
        });
    });
    
}

</script>
</body>
</html>