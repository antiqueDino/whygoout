<?php
    require_once("auth/EtreAuthentifie.php");

    $error ="";

    if (!isset($_GET['pid'])) {
        $error = "Identifiant manquant";
    }

    $pid = $_GET['pid'];

    $SQL = "DELETE FROM personnes WHERE pid = ?";
    $st = $db->prepare($SQL);
    $st->execute([$pid]);

    if (!$st->rowCount()==0) {
        $error = "Suppression inaboutie";
        include("allpeople.php");
    }else{
        header('Location: allpeople.php');
        exit;
    }
?>