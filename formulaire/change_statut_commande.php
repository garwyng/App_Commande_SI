<?php
include('Traitement/Connexion_base.php');
$choix=$_POST['choix'];

// suite a une saisie du choix envoi sur un formulaire demandans les parametre a modifier 



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
  $query_last_ln="SELECT * FROM commande WHERE N°commande='$choix'";
  $query_nbcommande= "SELECT 'N°commande' from commande WHERE N°commande='$choix'";
  $query_nbdemande= "SELECT 'N°commande' FROM demande WHERE N°commande='$choix'";
  $query_user= "SELECT * FROM users where email='$username' and password='$password' ";
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
<header><p><h1>Modification de la commande <?php echo $choix?></h1></p> </header>
 <?php 
 ?>
 
  <table id="Commande_si" border="1" cellspacing="1" cellpadding="1" >
   <thead>
    <tr>
      <?php while($row_commande = $stmt_commande->fetch(PDO::FETCH_ASSOC)) : ?>
       
      <form action="Traitement/Modif_statut_commande.php" method="post" enctype="multipart/form-data"> 
      <th>N° de Commande</th>
      <th><input type="hidden" name="N°commande" value="<?php echo htmlspecialchars($row_commande['N°commande']);?>">
      <input type="hidden" name="id" value="<?php $row_commande['id'];?>">
      <?php echo htmlspecialchars($row_commande['N°commande']);?>
      </th>
      <th><input type="hidden" name="statut">
      <?php echo htmlspecialchars($row_commande['statut']); ?>
      </th>
      <th>
      <select name="statut_commande" id="statut_commande">
            <option value="OUVERTE">OUVERTE</option>
            <option value="FERMEE">FERMEE</option>
      </th>

      
      <th>
        <button type="submit">Enregistrer</button>
        </form>
      </th>
      <tbody>
    </tr>
    <form action="https://localhost/commandesi/Traitement/Apply_new_statut.php" method="post" enctype="multipart/form-data"> 
     <tr>
      <th>Selectionner la ou les ligne(s) a modifiée(s)</th>
       <th>Demandeur</th>
       <th>Service</th>
       <th>Articles</th>
       <th>details</th>
       <th>Site Marchand</th>
       <th>qt_demandé</th>
       <th>date demande</th>
       <th>Centre</th>
       <th>Statut</th>
       <th>Commentaire
       <th>Valideur</th>
       <th>N°Commande</th>
       <th>Quantité reçu</th>
       <th>Date de réception</th>       
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
?><form action="https://localhost/commandesi/Traitement/Apply_new_statut.php" method="post" enctype="multipart/form-data"> 
     <?php 
     $i=0;
     
     while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
     <?php $i=$i+1?> 
     <input type="hidden" name="id<?php echo htmlspecialchars($i);?>" id="id<?php echo htmlspecialchars($i);?>" value="<?php echo htmlspecialchars($row['demande_id']); ?>"/>
     <tr>
      <td><input type="checkbox" name="ln[]" value="<?php echo $i;?>"><?php echo htmlspecialchars($i);?></input></td>
       <td ><?php echo htmlspecialchars($row['demandeur']); ?></td>
       <td ><?php echo htmlspecialchars($row['service']); ?></td>
       <td ><?php echo htmlspecialchars($row['article']); ?></td>
       <td ><?php echo htmlspecialchars($row['detail']); ?></td>
       <td ><?php echo htmlspecialchars($row['site_marchand']); ?></td>
       <td ><?php echo htmlspecialchars($row['qt_demandée']); ?></td>
       <td ><?php echo htmlspecialchars($row['date_demande']); ?></td>
       <td ><?php echo htmlspecialchars($row['centre']); ?></td>
       <td ><select name="statut<?php echo htmlspecialchars($i);?>" id="statut<?php echo htmlspecialchars($i);?>">
            <option value="NULL"></option>
            <option value="Validée">Validée</option>
            <option value="Refusée">Refusée</option>
       </select></td>
       <td><textarea name="commentaire<?php echo htmlspecialchars($i);?>" id="commentaire<?php echo htmlspecialchars($i);?>" cols="30" rows="10"></textarea></td>
       <td ><p> 
            <select id="email<?php echo htmlspecialchars($i);?>" name='email<?php echo htmlspecialchars($i);?>'>
    <?php 
      $sql= "SELECT * from users";
      $sql_centre= "SELECT * from lieu";
      $Result=mysqli_query($mysqli,$sql);
      $Result_centre=mysqli_query($mysqli,$sql_centre);?>
   <?php 
    
   while($email=mysqli_fetch_array($Result)){ ?>                  
                      <option value="<?php
                      echo htmlspecialchars($email['email']);?>"><?php echo $email['email'] ?></option> 
                      <?php } ?>
              </p>
  </select></td>
       <td ><?php echo htmlspecialchars($row['N°commande']); ?></td>
       <input type="hidden" name="N°commande<?php echo htmlspecialchars($i);?>" value="<?php echo htmlspecialchars($row['N°commande']); ?>">
       <td ><input type="number" name="qt_recu<?php echo htmlspecialchars($i);?>" id="qt_recu<?php echo htmlspecialchars($i);?>"></td>
       <td ><input type="date" name="date_recu<?php echo htmlspecialchars($i);?>" id="date_recu<?php echo htmlspecialchars($i);?>"></td>
       <input type="hidden" name="MAX_FILE_SIZE" value="80000" />
       <td ><input type="file" name="devis<?php echo htmlspecialchars($i);?>" id="devis<?php echo htmlspecialchars($i);?>"></td>
       <input type="hidden" name="MAX_FILE_SIZE" value="80000" />
       <td ><input type="file" name="bl<?php echo htmlspecialchars($i);?>" id="bl<?php echo htmlspecialchars($i);?>"></td>
       
     </tr>
   
     <?php endwhile; ?>
   </tbody>
   
   <?php endwhile; ?>
  
 </table>
 <td><button type="submit">Enregistrer</button></td></form>
 <br />
 
</body>
</html>
