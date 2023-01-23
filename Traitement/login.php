<?php 

$_SESSION='';
session_start();
include_once('Connexion_base.php');
$email=sprintf($_POST['email']);
$password=sprintf($_POST['password']);
$password=md5($password);
if(isset($_POST['email']) && isset($_POST['password'])){
    $sql="SELECT * FROM `Users` where `email`='$email' AND `password`='$password';" ;
    $resultat=$mysqli-> query($sql);
    while($rows=mysqli_fetch_array($resultat)){
        $identifiant=$rows['email'];
        $prenom=$rows['surname'];
        $droit=$rows['droit'];
    }
    if($identifiant=== $email){
        $_SESSION['prenom']=$prenom;
        $_SESSION['email']=$identifiant;
        setcookie('user_id', $prenom);
        if($droit>0){
        header('Location: ../Consultation_etendu.php');}
        else{header('Location: ../home.php');
        }
    }
        else{
            header ('Location: ../Traitement/Identifiant_Invalid.php');
        }
    }
    else{
        echo("Avec l'indentifiant et le mot de passe c'est mieux");
    }

?>