<?php

require_once('auth/EtreAuthentifie.php');

$error = "";

foreach (['eid', 'pid', 'typeid','id'] as $name) {
    if (!isset($_POST[$name])) {
        $error .= "La valeur du champs '$name' ne doit pas être vide. ";
    } else {
        $data[$name] = ($_POST[$name]);
    }
}


$SQL="SELECT* FROM personnes WHERE pid=?";
$st=$db -> prepare($SQL);
$st->execute([$data['pid']]);
$resu = $st->fetch();
if ($st->rowCount()==0) {
    header('Location: selectopen.php?eid='.$data['eid'].'&amp;pid='.$data['pid']);
    exit;
}

$type=4;

$SQL="SELECT * FROM personnes p inner join identifications i on p.pid=i.pid inner join itypes it on i.tid=it.tid WHERE p.pid=?";
$st=$db -> prepare($SQL);
$st->execute([$data['pid']]);
$res = $st->fetch();

if ($res && $st->rowCount()==0 && !empty($error)) {
    $SQL= "INSERT INTO  identifications VALUES (?,?,?)";
    $stmt = $db->prepare($SQL);
    $res = $stmt->execute([$pid,$type,$resu['nom']]);

}


$i=1;

$SQL = "INSERT INTO participations VALUES (DEFAULT,?,?,?,?)";
$stmt = $db->prepare($SQL);
$res = $stmt->execute([$data['eid'],$data['pid'],date("Y-m-d H:i:s"),$i]);

    if (!$res) {
        $error = "Erreur d'ajout d'evenement. ";
        header('Location: checkid.php?eid='.$data['eid'].'&amp;pid='.$data['pid']);
    }
    else{
        $error = "Soumission effectué";
        include("checkid.php");
    }



