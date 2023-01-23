<?php 
$commande_id=$_POST['id'];
$N°commande=$_POST['N°commande'];
$statut=$_POST['statut'];
$statut_commande=$_POST['statut_commande'];
$demandeur=$_COOKIE['user_id'];

include('../Traitement/Connexion_base.php');

$sql="UPDATE `commande` SET `statut`='$statut_commande' WHERE `commande`.N°commande='$N°commande'";

mysqli_query($mysqli,$sql);

echo $sql;
if($statut_commande==="FERMEE"){
    $annee = explode('-',$N°commande)[0];
    $mois = explode('-',$N°commande)[1];
    $N°= explode('-',$N°commande)[2];
    $currentY=date('Y');
    $currentM=date('m');
    $currentDay=date('d');
    $currentDate=$currentY.'-'.$currentM.'-'.$currentDay;
    if(($annee===$currentY )&&($mois===$currentM)){
        $N1=sprintf((int)$N° + 1);
        $N°commande_New=$currentY.'-'.$currentM.'-'.$N1;
        $sql_ouverture_commande="INSERT INTO `commande` (`id`, `N°commande`,`statut`,`demandeur`,`date_ouverture`) VALUES (NULL, '$N°commande_New', 'OUVERTE','$demandeur', '$currentDate') ";
        echo $sql_ouverture_commande;
        mysqli_query($mysqli,$sql_ouverture_commande);
    }else{
        $N°commande_New=$currentY.'-'.$currentM.'-'.'1';
        $sql_ouverture_commande="INSERT INTO `commande` (`id`, `N°commande`,`statut`,`demandeur`,`date_ouverture`) VALUES (NULL, '$N°commande_New', 'OUVERTE','$demandeur', '$currentDate') ";
        echo $sql_ouverture_commande;
        mysqli_query($mysqli,$sql_ouverture_commande);
    }
    echo ("c'est le : $N°commande_New");
    
    /*$resultat=mysqli_query($mysqli,$query_last_ln); 
    $resultat=mysqli_fetch_array($resultat);
    echo ("voici la commande:$resultat");
    
    //$N°commande_New=echo (date(Y).'-'.date(m).'-'.$i);
    //$requête="INSERT INTO commande (`id`,`demandeur`, `service`, `article`,`detail`, `site_marchand`,`qt_demandée`,  `date_demande`,`centre`,`N°commande`) VALUES (NULL,'$email','$service', '$article','$details','$site_marchand','$qt_demandée', '$date_demande', '$centre', '$N°commande')";
*/}
header('location: ../Consultation_etendu.php')
?>