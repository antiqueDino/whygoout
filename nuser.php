<?php

require_once("auth/EtreAuthentifie.php");

if (empty($_POST['login'])) {
    include('users_form.php');
    exit();
}

$error = "";

foreach (['login', 'mdp', 'mdp2','role'] as $name) {
    if (empty($_POST[$name])) {
        $error .= "La valeur du champs '$name' ne doit pas être vide";
    } else {
        $data[$name] = $_POST[$name];
    }
}


// Vérification si l'utilisateur existe
$SQL = "SELECT uid FROM users WHERE login=?";
$stmt = $db->prepare($SQL);
$res = $stmt->execute([$data['login']]);

if ($res && $stmt->fetch()) {
    $error .= "Login déjà utilisé";
}

if ($data['mdp'] != $data['mdp2']) {
    $error .="MDP ne correspondent pas";
}

if (!empty($error)) {
    include('users_form.php');
    exit();
}


foreach (['login', 'mdp','role'] as $name) {
    $clearData[$name] = $data[$name];
}

$passwordFunction =
    function ($s) {
        return password_hash($s, PASSWORD_DEFAULT);
    };

$clearData['mdp'] = $passwordFunction($data['mdp']);

try {
    $SQL = "INSERT INTO users(login,mdp,role) VALUES (:login,:mdp,:role)";
    $stmt = $db->prepare($SQL);

    $res = $stmt->execute($clearData);
    // echo "Utilisateur $clearData[nom] : " . $id . " ajouté avec succès.";
    $error = "Ajout effectué";
    include("users_form.php");
} catch (\PDOException $e) {
    http_response_code(500);
    echo "Erreur de serveur.";
    exit();
}




