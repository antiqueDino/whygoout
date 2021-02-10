<?php
    require_once("auth/EtreAuthentifie.php");

    $error ="";

    if (!isset($_GET['eid'])) {
        $error = "Evenement non identifiée. ";
    }

    $eid = $_GET['eid'];

    $SQL = "DELETE FROM evenements WHERE eid = ?";
    $st = $db->prepare($SQL);
    $st->execute([$eid]);

    if (!$st->rowCount()==0) {
        header('Location: alleve.php');
        exit;
    }else{
        header('Location: alleve.php');
        exit;
    }
?>