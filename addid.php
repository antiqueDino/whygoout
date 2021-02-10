<?php

require_once("auth/EtreAuthentifie.php");

$error = "";

if (!isset($_POST['id'])) {
    $error="Ientifiant existe déja";
    include('id_form.php');
    exit();
}

$idName = $_POST['id'];

// Vérification si l'identifiant est valide
$SQL = "SELECT * FROM itypes WHERE nom = ?";
$stmt = $db->prepare($SQL);
$res = $stmt->execute([$idName]);

if ($res && $stmt->rowCount()>=1) {
    $error .= "Identifiant déjà utilisé";
}


if (!empty($error)) {
    include('addpers_form.php');
    exit();
}


$SQL="INSERT INTO itypes VALUES (DEFAULT,?)";
$st=$db->prepare($SQL);
$res=$st->execute([$idName]);

if(!$res)
{
    $error = "Ajout inaboutie";
	include("id_form.php");
}
else
{
    header('Location: allid.php');
}