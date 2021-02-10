<?php

require_once("auth/EtreAuthentifie.php");


$error = "";

foreach (['titre', 'desc', 'dday','cat','eday','type'] as $name) {
    if (empty($_POST[$name])) {
        $error .= "La valeur du champs '$name' ne doit pas être vide. ";
    } else {
        $data[$name] = htmlspecialchars($_POST[$name]);
    }
}



function validateDate($date, $format = 'Y-m-d H:i:s')
{
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}

if (var_dump(validateDate($data['dday'], DateTime::ATOM)) || var_dump(validateDate($data['eday'], DateTime::ATOM))) {
    $error = "Invalide date";
}

if (!empty($error)) {
    include('addeve.php');
    exit();
}

$SQL = "INSERT INTO evenements VALUES (DEFAULT,?,?,?,?,?,?)";
$stmt = $db->prepare($SQL);
$res = $stmt->execute([$data['titre'
],$data['desc'],$data['dday'],$data['eday'],$data['type'],$data['cat']]);

    if (!$res) {
        $error = "Erreur d'ajout d'evenement. ";
        include("addeve.php");
    }else{
        $error = "Ajout effectué";
        include("addeve.php");
    }



