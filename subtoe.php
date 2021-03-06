<?php
    require_once("auth/EtreAuthentifie.php");
    // if ($idm->getRole()!="admin") {
    //     redirect($pathFor["acceuil.php"]);
    // }

    $title = "Personnes à l'évènement";
    $h = "Liste des personnes inscrites ";
    include("navadmin.php");
    if (!isset($_GET["eid"])) {
        header('Location: alleve.php');
    }
    $eid = $_GET["eid"];
?>

<?php

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
 
    <div class="flex flex-col py-2">

        <div class="bg-white mx-auto shadow overflow-hidden sm:rounded-lg">
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

<?php
        
    $SQL= "SELECT * FROM personnes INNER JOIN inscriptions ON personnes.pid=inscriptions.pid WHERE inscriptions.eid=?";
    $stmt = $db->prepare($SQL);
    $stmt->execute([$eid]);
    // $res = $stmt->fetch();
    // $reponse= $db->query($SQL);
?>
  <div class="-my-2 pt-4 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
    <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
      <table class="min-w-full">
        <thead>
          <tr>
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
              Pid
            </th>
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

    while ($donnees=$stmt->fetch()) {
        
?>

        <tr>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                <div class="ml-4">
                  <div class="text-sm leading-5 font-medium text-gray-900"><?php echo $donnees['pid']; ?></div>
              </div>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
              <div class="text-sm leading-5 text-gray-900"><?php echo $donnees['nom']; ?></div>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                <div class="text-sm leading-5 text-gray-900"><?php echo $donnees['prenom']; ?></div>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
              <a href="partpers.php?pid=<?php echo $donnees['pid'] ;?>" class="text-indigo-600 hover:text-indigo-900 focus:outline-none focus:underline">Part to</a>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
              <a href="nopers.php?pid=<?php echo $donnees['pid'] ;?>" class="text-indigo-600 hover:text-indigo-900 focus:outline-none focus:underline">No Part to</a>
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
