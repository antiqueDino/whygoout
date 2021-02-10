<?php
    require_once("auth/EtreAuthentifie.php");

if (!isset($_GET["uid"])) {
    header('Location: allusers.php');
    exit;
}

$uid = $_GET['uid'];
$error = "";


// Vérification si l'utilisateur existe
$SQL = "SELECT * FROM users WHERE uid=?";
$stmt = $db->prepare($SQL);
$stmt->execute([$uid]);

if ($stmt->rowCount()==0) {
    $error = "Renseigner le mot de passe";
    include('modifpw.php');
    exit();
}else{

    // Check if it pw row are empty
    if ((!isset($_POST['mdp']) || !isset($_POST['mdp2']))) {
        $error = "Renseigner le mot de passe";
        include('modifpw.php');
        exit();
    }

    foreach (['mdp', 'mdp2'] as $name) {
        if (empty($_POST[$name])) {
            $error .= "La valeur du champs '$name' ne doit pas être vide";
        } else {
            $data[$name] = $_POST[$name];
        }
    }



    if ($data['mdp'] != $data['mdp2']) {
        $error .="MDP ne correspondent pas";
    }

    if (!empty($error)) {
        include('modifpw.php');
        exit();
    }


    $mdp = $_POST['mdp'];


    $passwordFunction =
        function ($s) {
            return password_hash($s, PASSWORD_DEFAULT);
        };

    $finalmdp = $passwordFunction($mdp);

    $SQL = "UPDATE users SET mdp=? WHERE uid=?";
    $st = $db->prepare($SQL);
    $res = $st->execute([$finalmdp,$uid]);

    if (!$res) {
        $error = "Mise à jour echoue";
    }else {
        $error="Mise à jour effectuee";
        include_once("modifpw.php");
    }

}
?>