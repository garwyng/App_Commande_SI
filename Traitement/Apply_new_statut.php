<?php 
foreach(($_POST['ln']) as $i){ 
    include("Traitement/Connexion_base.php");
    if (empty($_POST['email'.$i])){
    $email=NULL;}
    else{
        $email=$_POST['email'.$i];}
    if (empty($_POST['qt_recu'.$i])){
    $qt_recu=null;}
    else{
        $qt_recu=$_POST['qt_recu'.$i];
    }
    if (empty($_POST['date_recu'.$i])){
    $date_recu=null;}
    else{
        $date_recu=$_POST['date_recu'.$i];
    }
    if (empty($_POST['devis'.$i])){
    $devis=null;}
    else{
        $devis=$_POST['devis'.$i];
    }
    if (empty($_POST['bl'.$i])){
    $bl=null;}
    else{
        $bl=$_POST['bl'.$i];
    }
    if (empty($_POST['statut'.$i])){
        $statut=null;}else{
            $statut=$_POST['statut'.$i];
        }
    if (empty($_POST['commentaire'.$i])){
        $commentaire=null;}else{
        $commentaire=$_POST['commentaire'.$i];
            }
    $demande_id=$_POST['id'.$i];
    $N°commande=$_POST['N°commande'.$i];
    if (!file_exists("Documents/$N°commande") && !is_dir("Documents/$N°commande")){ 
        mkdir("Documents/$N°commande");
        if (is_uploaded_file($_FILES['devis'.$i]['tmp_name'])) {
            $nom_devis = $_FILES['devis'.$i]['tmp_name'];
            $destination_devis=sprintf("Documents/$N°commande/$nom_devis");
            move_uploaded_file($nom_devis, $destination_devis);
  } else {
    $destination_devis=NULL;
  }
            if (is_uploaded_file($_FILES['bl'.$i]['tmp_name'])) {
                $bl_from = $_FILES['bl'.$i]['tmp_name'];
                $bl_to=sprintf("Documents/$N°commande/$bl_from");
                move_uploaded_file($bl_from, $bl_to);
  } else {
    $destination_bl=NULL;
  }

  sprintf("recapitulatif de donné saisie email=$email");
  //construction de la requete sql
    $sql_demande="UPDATE `demande` SET `statut`='$statut',`commentaire`='$commentaire',`valideur` = '$email',`qt_recu` = '$qt_recu',`date_recu` = '$date_recu',`devis`='$destination_devis',`bl`= '$destination_bl' WHERE `demande`.`demande_id` = '$demande_id'";
    echo $sql_demande;
    mysqli_query($mysqli,$sql_demande);
    mysqli_close($mysqli);
    echo htmlspecialchars($sql_demande);
    header('location: Consultation_etendu.php');}
    else{    if (empty($_POST['email'.$i])){
        $email=NULL;}
        else{
            $email=$_POST['email'.$i];}
        if (empty($_POST['qt_recu'.$i])){
        $qt_recu=null;}
        else{
            $qt_recu=$_POST['qt_recu'.$i];
        }
        if (empty($_POST['date_recu'.$i])){
        $date_recu=null;}
        else{
            $date_recu=$_POST['date_recu'.$i];
        }
        if (empty($_POST['devis'.$i])){
        $devis=null;}
        else{
            $devis=$_POST['devis'.$i];
        }
        if (empty($_POST['bl'.$i])){
        $bl=null;}
        else{
            $bl=$_POST['bl'.$i];
        }
        if (empty($_POST['statut'.$i])){
            $statut=null;}else{
                $statut=$_POST['statut'.$i];
            }
        if (empty($_POST['commentaire'.$i])){
            $commentaire=null;}else{
            $commentaire=$_POST['commentaire'.$i];
                }
        $demande_id=$_POST['id'.$i];
        $N°commande=$_POST['N°commande'.$i];
        if (is_uploaded_file($_FILES['devis'.$i]['tmp_name'])) {
        $nom_devis = $_FILES['devis'.$i]['tmp_name'];
        $destination_devis=sprintf("Documents/$N°commande/$nom_devis");
        move_uploaded_file($nom_devis, $destination_devis);
      } else {
        $destination_devis=NULL;
      }
                if (is_uploaded_file($_FILES['bl'.$i]['tmp_name'])) {
                    $bl_from = $_FILES['bl'.$i]['tmp_name'];
                    $bl_to=sprintf("Documents/$N°commande/$bl_from");
                    move_uploaded_file($bl_from, $bl_to);
      } else {
        $destination_bl=NULL;
      }
    
      sprintf("recapitulatif de donné saisie email=$email");
      //construction de la requete sql
        $sql_demande="UPDATE `demande` SET `statut`='$statut',`commentaire`='$commentaire',`valideur` = '$email',`qt_recu` = '$qt_recu',`date_recu` = '$date_recu',`devis`='$destination_devis',`bl`= '$destination_bl' WHERE `demande`.`demande_id` = '$demande_id'";
        echo $sql_demande;
        mysqli_query($mysqli,$sql_demande);
        mysqli_close($mysqli);
        echo htmlspecialchars($sql_demande);
        header('location: ../Consultation_etendu.php');}}
  
?>