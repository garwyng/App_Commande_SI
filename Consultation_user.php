<?php
  $host = 'localhost';
  $dbname = 'commande_si';
  $username = 'root';
  $password = 'root';
    
  $dsn = "mysql:host=$host;dbname=$dbname"; 
  // récupérer tous les utilisateurs
  $sql = "SELECT * FROM Users";
   
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
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="css/style.css" />
        <Title>Commande SI</Title>
    </head>
<body>
  <header><?php include('../header_etendu.php'); ?></header>
 <h1>Liste des utilisateurs</h1>
 <table>
   <thead>
     <tr>
       <th>Nom</th>
       <th>Prénom</th>
       <th>Email</th>
       <th>Service</th>
       <th>Droit</th>
     </tr>
   </thead>
   <tbody>
     <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
     <tr>
       <td><?php echo htmlspecialchars($row['name']); ?></td>
       <td><?php echo htmlspecialchars($row['surname']); ?></td>
       <td><?php echo htmlspecialchars($row['email']); ?></td>
       <td><?php echo htmlspecialchars($row['service']); ?></td>
       <td><?php echo htmlspecialchars($row['droit']); ?></td>
     </tr>
     <?php endwhile; ?>
   </tbody>
 </table>
 <div class="menu">
  <a href="../formulaire/formulaire_demande.php">Passe une commande</a>
 </div>
</body>
</html>