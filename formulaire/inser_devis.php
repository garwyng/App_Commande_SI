<!DOCTYPE html>
<?php
  $host = 'localhost';
  $dbname = 'commande_si';
  $username = 'root';
  $password = 'root';
    
  $dsn = "mysql:host=$host;dbname=$dbname"; 
  $query_last_ln="SELECT * FROM commande";
  $query_nbcommande= "SELECT 'N°commande' from commande";
  $query_nbdemande= "SELECT 'N°commande' FROM demande";
  try{
   $pdo = new PDO($dsn, $username, $password);
   $stmt_commande = $pdo->query($query_last_ln);
   $nbcommande=$pdo->query($query_nbcommande);
   $nbdemande=$pdo->query($query_nbdemande);
   if($stmt_commande === false){
    die("Erreur");
   }
   
  }catch (PDOException $e){
    echo $e->getMessage();
  }
?>

<html lang="fr">
    <head>
        <title>Insertion Devis</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
    <header>
        <?php include('../header_etendu.php'); ?>
    </header>
    <div class="Formulaire">
        <form action="../Traitement/traitement_insert_devis.php" method="POST" enctype="multipart/form-data">
        <label for="Commande">Selection de la commande concerné : </label>
        <select name="Commande" id="Commande">
        <?php 
                
                while($row_commande = $stmt_commande->fetch(PDO::FETCH_ASSOC)) : ?>               
                <option value="<?php echo htmlspecialchars($row_commande['N°commande']);?>">
                    <?php echo htmlspecialchars($row_commande['N°commande']); ?>
                </option> 
                    <?php endwhile ?>      
        </select>
        <input type="hidden" name="MAX_FILE_SIZE" value="80000" />
        <input type="file" name="devis" id="devis">inserer un devis </input>
        </form>
    </div>
    </body>
</html>