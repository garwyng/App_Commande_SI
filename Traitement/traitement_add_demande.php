<?php
date_default_timezone_set('Europe/Paris');
/*affectation des valeurs saisie par l'utilisateur à chaque variable*/
$email=$_POST['email'];
$article=$_POST['article'];
$qt_demandée=$_POST['qt_demandée'];
$site_marchand=$_POST['site_marchand'];
$centre=$_POST['centre'];
$details=$_POST['details'];
$date_demande=date('Y-m-d',null);
?>
<?php
$host = 'localhost';
$dbname = 'commande_si';
$username = 'root';
$password = 'root';
  
$dsn = "mysql:host=$host;dbname=$dbname"; 
// récupérer tous les utilisateurs
$sql_mail = "SELECT `service` FROM users WHERE email='$email'";
 
try{
 $pdo = new PDO($dsn, $username, $password);
 $stmt = $pdo->query($sql_mail);
 
 if($stmt === false){
  die("Erreur");
 }
 
}catch (PDOException $e){
  echo $e->getMessage();
}
?>
<?php
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $service=sprintf(htmlspecialchars($row['service']));
}
?>
<?php    
  // récupérer tous les utilisateurs
  $sql = "SELECT * FROM commande";
   
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
<?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)):
$N°commande=sprintf(htmlspecialchars ($row['N°commande'])) ;?>
<?php endwhile; ?>
<?php
//connection à la base
include('../Traitement/Connexion_base.php');

//construction de la requête sql insertion de la demande 
$requête="INSERT INTO demande (`demande_id`,`demandeur`, `service`, `article`,`detail`, `site_marchand`,`qt_demandée`,  `date_demande`,`centre`,`N°commande`) VALUES (NULL,'$email','$service', '$article','$details','$site_marchand','$qt_demandée', '$date_demande', '$centre', '$N°commande')";

// Check connection
if ($mysqli -> connect_errno) {
echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
exit();
}
mysqli_query($mysqli,$requête);
echo($requête);
header('Location: ../consultation_commande.php');
?>