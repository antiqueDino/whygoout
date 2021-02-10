<?php

require_once("auth/EtreAuthentifie.php");

$error = "";

if (!isset($_GET['eid'])) {
    header('Location: alleve.php');
    exit;
}

$eid = $_GET['eid'];

// Vérification si la personne existe
$SQL = "SELECT * FROM evenements WHERE eid=? ";
$stmt = $db->prepare($SQL);
$stmt->execute([$eid]);
$res = $stmt->fetch();

if ($res && $stmt->rowCount()==0) {
    $error .= "Evenement non identifiée";
    include('modeveform.php');
    exit();
}else{
    
        
    foreach (['titre', 'desc', 'dday','cat','eday','type'] as $name) {
        if (empty($_POST[$name])) {
            $error .= "La valeur du champs '$name' ne doit pas être vide. ";
        } else {
            $data[$name] = htmlspecialchars($_POST[$name]);
        }
    }



    // function validateDate($date, $format = 'Y-m-d H:i:s')
    // {
    //     $d = DateTime::createFromFormat($format, $date);
    //     return $d && $d->format($format) == $date;
    // }

    // if (var_dump(validateDate($data['dday'], DateTime::ATOM)) || var_dump(validateDate($data['eday'], DateTime::ATOM))) {
    //     $error = "Invalide date";
    // }

    if (!empty($error)) {
        include('modeveform.php');
        exit();
    }
        


    $SQL= "UPDATE  evenements SET intitule=?, description=?, dateDebut=?, dateFin=? ,type=? ,cid=? WHERE eid=?";
    $st= $db->prepare($SQL);
    $stmt = $db->prepare($SQL);
    $res = $stmt->execute([$data['titre'],$data['desc'],$data['dday'],$data['eday'],$data['type'],$data['cat'],$eid]); 

        if (!$res) {
            $error = "Erreur de modification";
        }else{
            $error = "Modification effectué";
            header('Location: alleve.php');
        }
}
?>