<?php include('Traitement/Connexion_base.php');
?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href=css/style.css />
        <Title>Liste Des Commandes SI</Title>
    </head>
<?php
  $host = 'localhost';
  $dbname = 'commande_si';
  $username = 'root';
  $password = 'root';
    
  $dsn = "mysql:host=$host;dbname=$dbname"; 
  $query_last_ln="SELECT * FROM commande where statut = 'OUVERTE'";
  try{
   $pdo = new PDO($dsn, $username, $password);
   $stmt_commande = $pdo->query($query_last_ln);
   if($stmt_commande === false){
    die("Erreur");
   }
   
  }catch (PDOException $e){
    echo $e->getMessage();
  }
?>



<body>
  <header><p> <h3>Liste des Acticles demandés pour la commande en cours :</h3></p> </header>
 <table id="Commande_si" border="1" cellspacing="1" cellpadding="1" >
   <thead>
    <tr>
      <th>N° de Commande</th>
      <?php while($row = $stmt_commande->fetch(PDO::FETCH_ASSOC)) : ?>
      </th>
      <th>
      <?php echo htmlspecialchars($row['N°commande']);$N°commande=$row['N°commande']; ?>
      </th>
      <th>
      <?php echo htmlspecialchars($row['statut']); ?>
      </th>
      <?php endwhile; ?>
      <tbody></tbody>
    </tr>
     <tr>
       <th>Demandeur</th>
       <th>Articles</th>
       <th>qt_demandé</th>
       <th>Centre</th>
       <th>statut</th>
     </tr>
   </thead>
   <tbody>

   <?php
  $host = 'localhost';
  $dbname = 'commande_si';
  $username = 'root';
  $password = 'root';
    
  $dsn = "mysql:host=$host;dbname=$dbname"; 
  $query_Recordset = "SELECT * FROM demande WHERE (`N°commande`= '$N°commande') and ((DAYOFYEAR(CURRENT_DATE)-DAYOFYEAR(date_demande))<31) AND YEAR(date_demande)=YEAR(CURRENT_DATE)";
  try{
   $pdo = new PDO($dsn, $username, $password);
   $stmt = $pdo->query($query_Recordset);
   if($stmt === false){
    die("Erreur");
   }
   
  }catch (PDOException $e){
    echo $e->getMessage();
  }
?>
     <?php 
     
     while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
     <tr>
       <td ><?php echo htmlspecialchars($row['demandeur']); ?></td>
       <td ><?php echo htmlspecialchars($row['article']); ?></td>
       <td ><?php echo htmlspecialchars($row['qt_demandée']); ?></td>
       <td ><?php echo htmlspecialchars($row['centre']); ?></td>
       <td ><?php echo htmlspecialchars($row['statut']); ?></td>
     </tr>
    
     <?php endwhile; ?>
   </tbody>
 </table>
 <div class="menu">
    <p>
    <a href="formulaire/Formulaire_demande.php">Passer une commande</a>
    </p>
 </div>
 
</body>
</html>