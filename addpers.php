<?php

require_once("auth/EtreAuthentifie.php");


$error = "";

foreach (['nom', 'prenom', 'typeid','id'] as $name) {
    if (empty($_POST[$name])) {
        $error .= "La valeur du champs '$name' ne doit pas être vide";
    } else {
        $data[$name] = $_POST[$name];
    }
}


// Vérification si l'identifiant est valide
$SQL = "SELECT * FROM identifications WHERE tid=? AND valeur = ?";
$stmt = $db->prepare($SQL);
$res = $stmt->execute([$data['typeid'],$data['id']]);

if ($res && $stmt->fetch()) {
    $error .= "Identifiant déjà utilisé";
}


if (!empty($error)) {
    include('addpers_form.php');
    exit();
}

$SQL = "INSERT INTO personnes VALUES (DEFAULT,?,?)";
$stmt = $db->prepare($SQL);
$res = $stmt->execute([$data['nom'],$data['prenom']]);
$pid=$db->lastInsertId();

try {
    $SQL = "INSERT INTO identifications VALUES (?,?,?)";
    $st = $db->prepare($SQL);
    $res = $st->execute([$pid,$data['typeid'],$data['id']]);
    
    if (!$res) {
        $error = "Erreur d'ajout d'id";
        include("addpers_form.php");
    }else{
        $error = "Ajout effectué";
        include("addpers_form.php");
    }
} catch (\PDOException $e) {
    http_response_code(500);
    echo "Erreur de serveur.";
    exit();
}




