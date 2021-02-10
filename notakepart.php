<?php
    //page d'utilisateur inscrit non participant
    //erreur SQL
    require_once("auth/EtreAuthentifie.php");
    // if ($idm->getRole()!="admin") {
    //     redirect($pathFor["acceuil.php"]);
    // }
    require_once("auth/loader.php");
    $title = "No Take Part";
    if (!isset($_GET["eid"])) {
        redirect($pathFor["acceuil"]);
    }
    $eid = $_GET["eid"];
    $h = "Personnes inscrites non participantes";
    include("navadmin.php");

    $error ="";

    $SQL= "SELECT * FROM evenements INNER JOIN categories ON evenements.cid = categories.cid WHERE evenements.eid=?";
    $st = $db->prepare($SQL); 
    $st->execute([$eid]);
    $res = $st->fetch();
    if ($st->rowCount()!=0) {
        $eventTitle = $res['intitule'];
        $desc = $res['description'];
        $debut = $res['dateDebut'];
        $fin = $res['dateFin'];
        $type = $res['type'];
        $cat = $res['nom'];


        $SQL= "SELECT DISTINCT p.nom,p.prenom,p.pid FROM personnes p INNER JOIN inscriptions i on p.pid=i.pid inner join participations pa on i.pid <> pa.pid where i.eid=?";
        $sta = $db->prepare($SQL);
        $reponse = $sta->execute([$eid]);

        if(!$reponse){
            $error = "Evenement sans participants";
        }else{
            
        
?>

    <div class="flex py-3">

        <div class="bg-white flex-1 pl-2 w-1/2 shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Information de l'évènement sélectionné 
                </h3>
                <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
                    Details et personnes n'ayant pas participé.
                </p>
            </div>
            <div>
                <dl>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Nom de l'évènement
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            <?php echo $eventTitle?>
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Description
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            <?php echo $desc?>
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Date de début
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            <?php echo date('d-m-Y H:i:s', strtotime($debut)); ?>
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Date de fin
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            <?php echo date('d-m-Y H:i:s', strtotime($fin)); ?>
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Categorie
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            <?php echo $cat?>
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Type
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                <?php if($type=='ferme'):?>
                                    <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M4 8V6a6 6 0 1 1 12 0v2h1a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2h1zm5 6.73V17h2v-2.27a2 2 0 1 0-2 0zM7 6v2h6V6a3 3 0 0 0-6 0z"/>
                                    </svg>
                                <?php else:?>
                                    <svg  width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M4 8V6a6 6 0 1 1 12 0h-3v2h4a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2h1zm5 6.73V17h2v-2.27a2 2 0 1 0-2 0zM7 6v2h6V6a3 3 0 0 0-6 0z"/>
                                    </svg>
                                <?php endif; ?>
                        </dd>
                    </div>
                </dl>
            </div>

            
        </div>

        <div class="flex-1 -my-2 py-2 px-4 max-w-1/4 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
            <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                <table class="table-auto w-24 min-w-auto sm:min-w-full md:min-w-0 lg:min-w-full">
                    <thead>
                            <tr>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Nom
                                </th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Prenom
                                </th>
                            
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                            </tr>
                    </thead>
                    <tbody class="bg-white">
                        <?php

                            while ($donnees=$sta->fetch()) {
                            
                                
                        ?>

                                <tr>
                                    <td class="px-6 py-4 whitespace-normal border-b border-gray-200">
                                        <div class="ml-4">
                                        <div class="text-sm leading-5 font-medium text-gray-900"><?php echo $donnees['nom']; ?></div>
                                    </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-normal border-b border-gray-200">
                                    <div class="text-sm leading-5 text-gray-900"><?php echo $donnees['prenom']; ?></div>
                                    </td>
                                </tr>
                                        
                                            
                                    
                                        
                    <?php
                                }
                            }
                        }
                    ?>                            


                    </tbody>
                </table>
            </div>
    </div>
  </div>
</div>

<?php
    include_once("footer.php");
?>
