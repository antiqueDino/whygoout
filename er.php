<?php
     require_once("auth/loader.php");


    $error = "";

    foreach (['nom', 'prenom', 'id','eid','typeid'] as $name) {
        if (!isset($_POST[$name])) {
            echo "La valeur du champs '$name' ne doit pas être vide";
        } else {
            $data[$name] = $_POST[$name];
        }
    }

    //Vérification que l'évènement existe
    $eid = $_POST['eid'];
    $SQL = "SELECT * FROM evenements WHERE eid=?";
        $st = $db->prepare($SQL);
        $st->execute([$eid]);

    if ($st->rowCount() == 0) {
        
        $error = "Evenements inexistant";
        header('Location: er_form.php?eid='.$eid);
    }

    //Vérification de l'inscription à l'évènement
    $SQL = "SELECT inscriptions.pid FROM inscriptions INNER JOIN personnes ON inscriptions.pid  = personnes.pid WHERE personnes.nom=? AND personnes.prenom=? AND inscriptions.eid=?";
    $st = $db->prepare($SQL);
    $st->execute([$data['nom'], $data['prenom'],$data['eid']]);
        
    $row = $st->fetch();
    if($row){
        $error = "Déja inscrit à l'évènement";
    }

    if (!empty($error)) {
        header('Location: er_form.php?eid='.$eid);
        exit();
    }

    //Vérification si le nom et le prénom existe déja
    $pid = 0;
    $SQL = "SELECT pid FROM personnes WHERE nom=? AND prenom=?";
    $stmt = $db->prepare($SQL);
    $res = $stmt->execute([$data['nom'], $data['prenom']]);

    if ($res && ($row = $stmt->fetch())) {
        $pid = $row['pid'];
    }else{
        $SQL = "INSERT INTO personnes VALUES (DEFAULT,?,?)";
        $stmt = $db->prepare($SQL);
        $res = $stmt->execute([$data['nom'], $data['prenom']]);
        $pid = $db->lastInsertId();
        
        if(!$res){
            $error="Erreur de création de la personne";
            include("er_form.php");
        }else{
            $SQL = "INSERT INTO identifications VALUES (?,?,?)";
            $stmt = $db->prepare($SQL);
            $res = $stmt->execute([$pid, $data['typeid'], $data['id']]);
            if (!$res) $error = "Ajout identifiant inabouti";
            include("er_form.php");

        }
        header('Location: er_form.php?eid='.$eid);
    }

//     if (!!isset($error)) {
//         include('er_form.php?$eid');
//         exit();
//     }

//     //Uid?
//     $uid = 1;
//     if ($idm->getIdentity()) $uid = $idm->getIdentity();

//     //Insertion de la personne dans la table inscription
    
// try {
//     $SQL = "INSERT INTO inscriptions(pid,eid,uid) VALUES (:pid,:eid,:uid)";
//     $stmt = $db->prepare($SQL);

//     $res = $stmt->execute([[$pid, $data['eid'], $uid]]);

//     redirect($pathFor['root']);
// } catch (\PDOException $e) {
//     http_response_code(500);
//     echo "Erreur de serveur.";
//     exit();
// }


?>