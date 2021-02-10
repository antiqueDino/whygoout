<?php
    //page d'utilisateur inscrit participant
    require_once("auth/EtreAuthentifie.php");
    // if ($idm->getRole()!="admin") {
    //     redirect($pathFor["acceuil.php"]);
    // }
    // require_once("auth/loader.php");
    $title = "Inscrire";
    if (!isset($_GET["eid"])) {
        header('Location: alleve.php');
    }
    $eid = $_GET["eid"];
    $h = "Inscrire à l'évènement";
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

        $SQL = "SELECT * FROM personnes";
        $sta = $db->prepare($SQL);
        $reponse = $sta->execute([$eid]);

        if(!$reponse){
            $error = "Evenement sans participants";
        }else{
            
        
?>
 <?php
                    if (!empty($error)) {
        ?>
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                <div class="flex">
                    <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                    <div>
                        <p class="font-bold">Erreur d'inscription</p>
                        <p class="text-sm">
                        <?php                       
                                echo "<p class=\"error\">".($error??"")."</p>";
                        ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php
                        }
        ?>    
    <div class="flex flex-col py-4">

        <div class="bg-white mx-auto inline-block shadow overflow-hidden sm:rounded-lg">
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

        <div class="-my-2 py-2 pt-8 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
            <div class="align-middle min-w-auto shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                <table class="table-auto w-24 min-w-0 sm:min-w-full md:min-w-0 lg:min-w-full">
                    <thead>
                            <tr>
                                <th class="px-6 pl-8 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
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
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="ml-4">
                                            <div class="text-sm leading-5 font-medium text-gray-900"><?php echo $donnees['nom']; ?></div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="text-sm leading-5 text-gray-900"><?php echo $donnees['prenom']; ?></div>
                                    </td>
                                    <td class="p-3 px-5 whitespace-no-wrap border-b border-gray-200 flex justify-end">
                                        <button type="button" class="mr-3 text-sm bg-green-500 hover:bg-green-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                            <a href="adminsub.php?pid=<?php echo $donnees['pid'] ;?>&amp;eid=<?php echo $eid ;?>" class=" focus:outline-none focus:underline">Inscrire</a>
                                        </button>
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
