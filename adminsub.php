<?php

require_once("auth/EtreAuthentifie.php");

$error = "";

if (!isset($_GET['pid']) || !isset($_GET['eid'])) {
    header('Location: alleve.php');
    exit;
}

$pid = $_GET['pid'];
$eid = $_GET['eid'];

$SQL="SELECT uid FROM users WHERE login = ?";
$st=$db -> prepare($SQL);
$st->execute([$idm->getIdentity()]);
$resu = $st->fetch();

$uid = $resu['uid'] ;

// Vérification si la personne existe
$SQL = "SELECT * FROM personnes WHERE pid=? ";
$stmt = $db->prepare($SQL);
$stmt->execute([$pid]);
$res = $stmt->fetch();

if ($res && $stmt->rowCount()==0) {
    header('Location: subto.php?pid='.$pid.'&amp;eid='.$eid);
    exit();
}
    

// Vérification si l'évènement existe
$SQL = "SELECT * FROM evenements WHERE eid=? ";
$stmt = $db->prepare($SQL);
$stmt->execute([$eid]);
$res = $stmt->fetch();

if ($res && $stmt->rowCount()==0) {
    header('Location: alleve.php');
    exit();
}


// Vérification si la personne est déja inscrite
$SQL = "SELECT * FROM inscriptions WHERE pid=? AND eid=? ";
$stmt = $db->prepare($SQL);
$stmt->execute([$pid,$eid]);
$res = $stmt->fetch();

if ( $stmt->rowCount()!=0) {
    header('Location: subtoe.php?eid='.$eid);
    exit();
}else{


    $SQL= "INSERT INTO  inscriptions VALUES (?,?,?)";
    $stmt = $db->prepare($SQL);
    $res = $stmt->execute([$pid,$eid,$uid]); 

        if (!$res) {
            header('Location: alleve.php');
        }else{
            header('Location: subtoe.php?eid='.$eid);
        }
}
?>