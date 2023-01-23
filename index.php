
<?php
//fichier de connexion a la base 
include('Traitement/Connexion_base.php');
 ?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body>
  <form action="Traitement\login.php" method="post">
    <label for="email">Adresse Mail: </label>
    <input type="email" name="email" id="email" required/>
    <label for="password">Mot de passe:</label>
    <input type="password" name="password" id="password" required/>
    <button type="submit">Connexion</button>
  </form>
  <?php 
  
  ?>
  </body>
</html>

