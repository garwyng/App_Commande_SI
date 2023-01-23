<?php
/*affetation des valeus saisie par l'uitlisateur a chaque variable*/
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$password=md5($password);
$surname=$_POST['surname'];
$service=$_POST['service'];
$droit=$_POST['droit'];
//construction de la requête sql
$requête=("INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `surname`, `service`, `droit`) VALUES (NULL, '$name', '$email', '$password', '$surname', '$service', '$droit')");
//connection à la base
include('../Traitement/connexion_base.php');
// Check connection
if ($mysqli -> connect_errno) {
echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
exit();
}
mysqli_query($mysqli,$requête);
echo ('utilisateur bien ajouté');
header('Location: ../Consultation_user.php');

?>