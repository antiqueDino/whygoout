<?php
    require_once("auth/EtreAuthentifie.php");

    $error ="";

    if (!isset($_GET['tid'])) {
        $error = "Identifiant manquant";
    }

    $pid = $_GET['tid'];

    $SQL = "DELETE FROM itypes WHERE tid = ?";
    $st = $db->prepare($SQL);
    $st->execute([$pid]);

    if (!$st->rowCount()==0) {
        $error = "Suppression inaboutie";
        include("allid.php");
    }else{
        header('Location: allid.php');
        exit;
    }
?>