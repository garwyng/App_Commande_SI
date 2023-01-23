<?php
  $host = 'localhost';
  $dbname = 'commande_si';
  $username = 'root';
  $password = 'root';
  $date1=$_POST['date1'];
  $date2=$_POST['date2'];
  

  $dsn = "mysql:host=$host;dbname=$dbname"; 
  // récupérer tous les utilisateurs
  $sql = "SELECT * FROM commande where date_commande >= '$date1' and date_commande<= '$date2'" ;
   
  try{
   $pdo = new PDO($dsn, $username, $password);
   $stmt = $pdo->query($sql);
   
   if($stmt === false){
    die("Erreur");
   }
   
  }catch (PDOException $e){
    echo $e->getMessage();
  }
?>