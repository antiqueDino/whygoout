<?php

require_once("auth/EtreAuthentifie.php");
$error = "";

if (!isset($_GET['tid'])) {
    header('Location: allid.php');
    exit;
}

$tid = $_GET['tid'];

// Vérification si l'identifiant existe
$SQL = "SELECT * FROM itypes WHERE tid=? ";
$stmt = $db->prepare($SQL);
$stmt->execute([$tid]);
$res = $stmt->fetch();

if ($res && $stmt->rowCount()==0) {
    $error .= "Identifiant non identifiée";
    include('modidform.php');
    exit();
}else{
    
    

    if (!isset($_POST['id'])) {
        $error = "Renseigner le champ identifiant";
        include('modidform.php');
        exit();
    }

    $id = $_POST['id'];

    $SQL= "UPDATE  itypes SET nom = ? WHERE tid = ?";
    $stmt = $db->prepare($SQL);
    $res = $stmt->execute([$id,$tid]); 

        if (!$res) {
            $error = "Erreur de modification";
        }else{
            $error = "Modification effectué";
            header('Location: allid.php');
        }
}
?>