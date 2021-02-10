<?php
    require_once("auth/EtreAuthentifie.php");
    // if ($idm->getRole()!="admin") {
    //     redirect($pathFor["acceuil.php"]);
    // }

    $title = "Listes des personnes";
    $h = "Liste des personnes ";
    include("navadmin.php");

    $SQL= "SELECT * FROM personnes";
    $reponse= $db->query($SQL);
?>
<div class="flex  mx-auto py-3">
  <!-- <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8"> -->
    <div class="align-middle inline-block min-w-auto mx-auto shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
      <table class="min-w-auto">
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

    while ($donnees=$reponse->fetch()) {
        
?>

        <tr>
            <td class="px-6 py-4 whitespace-normal border-b border-gray-200">
                <div class="ml-4">
                  <div class="text-sm leading-5 font-medium text-gray-900"><?php echo $donnees['pid']; ?></div>
              </div>
            </td>
            <td class="px-6 py-4 whitespace-normal border-b border-gray-200">
              <div class="text-sm leading-5 text-gray-900"><?php echo $donnees['nom']; ?></div>
            </td>
            <td class="px-6 py-4 whitespace-normal border-b border-gray-200">
                <div class="text-sm leading-5 text-gray-900"><?php echo $donnees['prenom']; ?></div>
            </td>
            <td class="px-6 py-4 whitespace-normal text-right text-sm leading-5 font-medium">
              <a href="partpers.php?pid=<?php echo $donnees['pid'] ;?>" class="text-indigo-600 hover:text-indigo-900 focus:outline-none focus:underline">Présent</a>
            </td>
            <td class="px-6 py-4 whitespace-normal text-right text-sm leading-5 font-medium">
              <a href="nopers.php?pid=<?php echo $donnees['pid'] ;?>" class="text-indigo-600 hover:text-indigo-900 focus:outline-none focus:underline">Absent</a>
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

