<?php include_once('../Traitement/Connexion_base.php');
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF8">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <header>
            <h1>Ajourter une commande</h1>
        </header>
        <p><?php include('../Consultation_user.php') ?></p>

        <form method="post" action="../Traitement/Add_user.php">
            <div class="formulaire">
                <p>
                    <label for="name">Nom de l'utilisateur à ajouté :</label>
                    <input type="text" name="name" id="name" required>
                </p>
            </div>
            <div class="formulaire">
                <p>
                    <label for="surname">Prénom de l'utilisateur à ajouté :</label>
                    <input type="text" name="surname" id="surname" required>
                </p>
            </div>
            <div class="formulaire">
                <p>
                    <label for="email">Adresse mail :</label>
                    <input type="email" name="email" id="email" required>
                </p>
            </div>
            <div class="formulaire">
                <p>
                    <label for="service">service :</label>
                    <input type="text" name="service" id="service" required>
                </p>
            </div>
            <div class="formulaire">
                <p>
                    <label for="droit">Droit associer à l'utilisateur (1/droit étendu, 0/ droit restreint) :</label>
                    <input type="text" name="droit" id="droit" required>
                </p>
            </div>
            <div class="formulaire">
                <p>
                    <label for="password">Mot de Passe(sera changer par l'utilisateur) :</label>
                    <input type="text" name="password" id="password" required>
                </p>
            </div>
            <button type="submit">Ajouté</button>
        </form>
    </body>
</html>


