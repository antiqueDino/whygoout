<?php

require("auth/EtreAuthentifie.php");


$error = "";

foreach (['eid', 'pid', 'tid','valeur'] as $name) {
    if (!isset($_POST[$name])) {
        $error .= "La valeur du champs '$name' ne doit pas être vide. ";
    } else {
        $data[$name] = ($_POST[$name]);
    }
}




$SQL="SELECT nom FROM personnes WHERE pid=?";
$st=$db -> prepare($SQL);
$st->execute([$data['pid']]);
$resu = $st->fetch();
if ($st->rowCount()==0) {
    header('Location: selectopen.php?eid='.$data['eid'].'&amp;pid='.$data['pid']);
    exit;
}

$type=4;

$SQL="SELECT* FROM personnes p inner join identifications i on p.pid=i.pid inner join itypes it on i.tid=it.tid WHERE p.pid=?";
$st=$db -> prepare($SQL);
$st->execute([$data['pid']]);
$res=$st->fetch();

$id = $res['valeur'];

$tid = $res['tid'] ;

if ($st->rowCount()==0 ) {
    $SQL= "INSERT INTO  identifications VALUES (?,?,?)";
    $stmt = $db->prepare($SQL);
    $stmt->execute([$data['pid'],$type,$resu['nom']]);
}
if ($res['valeur'] != $data['valeur'] || $res['tid'] != $data['tid']) {
    // echo "erreur identifiant";
    header('Location: selectopen.php');
    exit;
}else {


$SQL="SELECT uid FROM users WHERE login = ?";
$st=$db -> prepare($SQL);
$st->execute([$idm->getIdentity()]);
$resu = $st->fetch();

$uid = $resu['uid'] ;

$SQL = "INSERT INTO participations VALUES (DEFAULT,?,?,?,?)";
$stmt = $db->prepare($SQL);
$res = $stmt->execute([$data['eid'],$data['pid'],date("Y-m-d H:i:s"),$uid]);

    if (!$res) {
        $error = "Erreur d'ajout d'evenement. ";
        // echo "error";
        header('Location: selectopen.php');
    }
    else{
        $error = "Soumission effectué";
        header('Location: participants.php?eid='.$data['eid']);
        exit();
    }

}

