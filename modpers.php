<?php

require_once("auth/EtreAuthentifie.php");

$error = "";

if (!isset($_GET['pid'])) {
    header('Location: allpeople.php');
    exit;
}

$pid = $_GET['pid'];

// Vérification si la personne existe
$SQL = "SELECT * FROM personnes WHERE pid=? ";
$stmt = $db->prepare($SQL);
$stmt->execute([$pid]);
$res = $stmt->fetch();

if ($res && $stmt->rowCount()==0) {
    $error .= "Personne non identifiée";
    include('modpers_form.php');
    exit();
}else{
    
    // Vérification si l'identifiant est valide
    $SQL = "SELECT * FROM identifications WHERE pid = ?";
    $stmt = $db->prepare($SQL);
    $stmt->execute([$pid]);
    $res = $stmt->fetch();

    if ($res && $stmt->rowCount()==0) {
        $error .= "Identifiant non trouvé pour la personne. ";
        include('modpers_form.php');
        exit();
    }


    foreach (['nom', 'prenom', 'typeid','id'] as $name) {
        if (empty($_POST[$name])) {
            $error .= "Le champ '$name' ne doit pas être vide. ";
        } else {
            $data[$name] = $_POST[$name];
        }
    }

    if (!empty($error)) {
        include('modpers_form.php');
        exit();
    }

    $SQL= "UPDATE  personnes p inner join identifications i  on p.pid=i.pid inner join itypes it on i.tid=it.tid  SET p.nom=?, p.prenom=?, i.tid=? , i.valeur=? where p.pid=?";
    $stmt = $db->prepare($SQL);
    $res = $stmt->execute([$data['nom'],$data['prenom'],$data['typeid'],$data['id'],$pid]); 

        if (!$res) {
            $error = "Erreur de modification";
        }else{
            $error = "Modification effectué";
            include("modpers_form.php");
        }
}