<?php
    require_once("auth/EtreAuthentifie.php");
    // if ($idm->getRole()!="admin") {
    //     redirect($pathFor["acceuil.php"]);
    // }

    $title = "Participations";
    $h = "Liste des participants";
    include("navadmin.php");

    $SQL= "SELECT  DISTINCT pe.nom,pe.prenom FROM participations p INNER JOIN personnes pe on p.pid=pe.pid ";
    $reponse= $db->query($SQL);
?>

<div class="flex flex-row mx-auto py-3">
  <!-- <div class="-my-2 py-2 overflow-x-auto mx-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8"> -->
    <div class="align-middle inline-block min-w-auto shadow mx-auto overflow-hidden sm:rounded-lg border-b border-gray-200">
      <table class="min-w-auto mx-auto">
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

    while ($donnees=$reponse->fetch()) {
        
?>

        <tr>
            <td class="px-6 py-4 whitespace-normal border-b border-gray-200">
              <div class="text-sm leading-5 text-gray-900"><?php echo $donnees['nom']; ?></div>
            </td>
            <td class="px-6 py-4 whitespace-normal border-b border-gray-200">
                <div class="text-sm leading-5 text-gray-900"><?php echo $donnees['prenom']; ?></div>
            </td>
        </tr>
                  
                    
                   
                     
<?php
    }
?>                            


    </tbody>
      </table>
    </div>
  </div>
<!-- </div> -->

