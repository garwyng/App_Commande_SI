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



<body class="block_page">
  <?php include('../header_etendu.php'); ?>
<header><h1>Bonjour <?php echo $_COOKIE['user_id'] ?> Voici la liste des Acticles commandés sur les 30 derniers jours</h1></header>
 <?php 
 ?>
 <div class="tableau"></div>
  
   <thead>
    <tr>
      <?php while($row_commande = $stmt_commande->fetch(PDO::FETCH_ASSOC)) : ?>
        <form action="../Traitement/change_statut_commande.php" method="post">
        <table id="Commande_si" border='2' margin="10" cellspacing="1" cellpadding="1" > 
        <th>N° de Commande</th>
          <th><?php echo htmlspecialchars($row_commande['N°commande']);?></th>
      <th><?php echo htmlspecialchars($row_commande['statut']); ?></th>
      <th><button type="sumit">modifier</button><input type="hidden" name="choix" id="choix" value="<?php echo htmlspecialchars($row_commande['N°commande']) ;?>"></form></th>
      <tbody>
    </tr>
     <tr>
       <th>Demandeur</th>
       <th>Service</th>
       <th>Articles</th>
       <th>details</th>
       <th>Site Marchand</th>
       <th>qt_demandé</th>
       <th>date demande</th>
       <th>Centre</th>
       <th>Statut</th>
       <th>Commentaire</th>
       <th>Valideur</th>
       <th>N°Commande</th>
       <th>Date de réception</th>
       <th>Quantité reçu</th>
       <th>Devis</th>
       <th>BL</th>
     </tr>
   </thead>
   </tbody>
   <tbody>
   <?php
  $host = 'localhost';
  $dbname = 'commande_si';
  $username = 'root';
  $password = 'root';
    
  $dsn = "mysql:host=$host;dbname=$dbname"; 
  $query_Recordset = "SELECT * FROM demande WHERE N°commande='$row_commande[N°commande]' and ((DAYOFYEAR(CURRENT_DATE)-DAYOFYEAR(date_demande))<31) AND YEAR(date_demande)=YEAR(CURRENT_DATE)";
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
       <td ><?php echo htmlspecialchars($row['service']); ?></td>
       <td ><?php echo htmlspecialchars($row['article']); ?></td>
       <td ><?php echo htmlspecialchars($row['detail']); ?></td>
       <td ><?php echo htmlspecialchars($row['site_marchand']); ?></td>
       <td ><?php echo htmlspecialchars($row['qt_demandée']); ?></td>
       <td ><?php echo htmlspecialchars($row['date_demande']); ?></td>
       <td ><?php echo htmlspecialchars($row['centre']); ?></td>
       <td ><?php echo htmlspecialchars($row['statut']); ?></td>
       <td ><?php echo htmlspecialchars($row['commentaire']); ?></td>
       <td ><?php echo htmlspecialchars($row['valideur']); ?></td>
       <td ><?php echo htmlspecialchars($row['N°commande']); ?></td>
       <td ><?php echo htmlspecialchars($row['qt_recu']); ?></td>
       <td ><?php echo htmlspecialchars($row['date_recu']); ?></td>
       <td ><a href="<?php echo htmlspecialchars($row['devis']); ?>" target="_blank"><?php echo htmlspecialchars($row['devis']); ?></a></td>
       <td ><a href="<?php echo htmlspecialchars($row['bl']); ?>"target="_blank"><?php echo htmlspecialchars($row['bl']); ?></a></td>
     </tr>
      
     <?php endwhile; ?>
   </tbody>
   
   <?php endwhile; ?>
 </table>
 <br />
</body>
</html>