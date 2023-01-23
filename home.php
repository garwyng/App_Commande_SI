
<?php include_once('Traitement/Connexion_base.php');
?>

<!DOCTYPE <!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Accueil</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
    <header>
        <h1> Bonjour Bienvenue <?php echo $_COOKIE['user_id'];?> sur l'interface pour passer une demande de matériel</h1>
    <?php include('Consultation_commande.php');?>

  </header>
    </header>
    <div class='block_commande'>
        
    </div>
    </body>
</html>