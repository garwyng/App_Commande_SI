<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href=css/style.css />
        <Title>Liste Des Commandes SI</Title>
    </head>


<body>
  <header><p> <h1>Liste des Commandes</h1></p> </header>
  <div class="choix_date">
    <p>
        <form action="../traitement/traitement_add_commande.php" method="POST">
        <p>
            <label for="date1">date :</label>
            <input type="date" name="date1" id="date1" required>
         </p>
         <p>
                    <label for="date2">date :</label>
                    <input type="date" name="date2" id="date2" required>
                </p>
                <button type="submit">Soumettre</button>
        </form>
      
    </p>
  </div>

  

 <table id="Commande_si" border="1" cellspacing="1" cellpadding="1" >
   <thead>
     <tr>
       <th class="tableau_entete">N commande</th>
       <th>Demandeur</th>
       <th>Articles</th>
       <th>qt_demandé</th>
       <th>Centre</th>
       <th>statut</th>
     </tr>
   </thead>
   <tbody>
     <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
     <tr>
       <td class="tableau"><?php echo htmlspecialchars($row['commande_id']); ?></td>
       <td class="tableau"><?php echo htmlspecialchars($row['demandeur']); ?></td>
       <td class="tableau"><?php echo htmlspecialchars($row['article']); ?></td>
       <td class="tableau"><?php echo htmlspecialchars($row['qt_demandé']); ?></td>
       <td class="tableau"><?php echo htmlspecialchars($row['centre']); ?></td>
       <td class="tableau"><?php echo htmlspecialchars($row['statut']); ?></td>
     </tr>
     <?php endwhile; ?>
   </tbody>
 </table>
 <div class="menu">
    <p>
    <a href="../formulaire/formulaire_commande.php">Passe une commande</a>
    </p>
 </div>
 <script src="scripts/main.js"></script>
</body>
</html>