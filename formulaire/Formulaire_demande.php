<?php
    $mysqli = new mysqli('localhost','root','root','commande_si'); 
    $sql= "SELECT * from users";
    $sql_centre= "SELECT * from lieu";
    $Result=mysqli_query($mysqli,$sql);
    $Result_centre=mysqli_query($mysqli,$sql_centre);
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF8">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <header>
            <h1>Ajouter une commande</h1>
        </header>
        <form method="post" action="..\Traitement\traitement_add_demande.php">
        <div class="formulaire">

                <p> 
                    <label for="email">Choix du demandeur :</label> 
                    <br> 
                    <select id="email" name='email'>
    <?php 
      
     while($email=mysqli_fetch_array($Result)){ ?>                  
                        <option value="<?php
                        echo htmlspecialchars($email['email']);?>"><?php echo $email['email'] ?></option> 
                        <?php } ?>
                </p>
    </select>
            <div class="formulaire">
                <p>
                <label for="article">Article :</label>
                <input type="text" name="article" id="article" required>
            </p>
            <div class="formulaire"><p>    
                <label for="site_marchand" placeholder="https://www.amazon.fr/s?k=ecran+pc+gamer&sprefix=ecrna%2Caps%2C75&ref=nb_sb_ss_sc_1_4">Url de l'article(optionel) :</label>
                <input type="url" name="site_marchand" id="site_marchand">
                <br /></p>
            </div>
            <div class="formulaire">

<p> 
    <label for="centre">Choix du Centre Orsys :</label> 
    <br> 
    <?php
  $host = 'localhost';
  $dbname = 'commande_si';
  $username = 'root';
  $password = 'root';
    
  $dsn = "mysql:host=$host;dbname=$dbname"; 
  // récupérer tous les utilisateurs
  $sql = "SELECT * FROM lieu";
   
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
    <select id="centre" name='centre'>
    <?php 
      
      while($centre=mysqli_fetch_array($Result_centre)){ ?>                  
                         <option value="<?php echo htmlspecialchars ($centre['centre']);?>"><?php echo ($centre['centre']); ?></option> 
                         <?php } ?>
                 </p>
     </select>
            </div>
            <div class="formulaire"><p>
                <label for="qt_demandée">qt_demandé demandée :</label>
                <input type="number" name="qt_demandée" id="qt_demandée" required>
                <br /></p>
            </div>
            <div class="formulaire">
                <p>Details :
                <input name="details" id="details" required>
            </input>
                </p>
                </div>
                <p> 
                <input type="submit" name="envoyer" value="Envoyer" />
                </p>
            
                
        </form>
    </body>
</html>


