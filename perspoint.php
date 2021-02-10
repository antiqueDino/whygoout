<?php
    require_once("auth/EtreAuthentifie.php");
    // if ($idm->getRole()!="admin") {
    //     redirect($pathFor["acceuil.php"]);
    // }

    $title = "Pointer à un évènement ouvert";
    $h = "Pointer à un évènement ouvert";
    include("navbar.php");

    $i = 1;
    $SQL= "SELECT * FROM personnes";
    $reponse= $db->query($SQL);
?>

<div class="flex flex-col mx-auto">
        
  <div class="-my-2 py-2 overflow-x-auto mx-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
    <div class="align-middle  min-w-auto py-3 shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
      <table class="min-w-auto mx-auto ">
        <thead>
          <tr>
          <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
              ID
            </th>
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
              Nom
            </th>
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
              Prenom
            </th>
            
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
            
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
                  <div class="text-sm leading-5 font-medium text-gray-900"><?php echo $i; ?></div>
              </div>
            </td>
            <td class="px-6 py-4 whitespace-normal border-b border-gray-200">
              <div class="text-sm leading-5 text-gray-900"><?php echo $donnees['nom']; ?></div>
            </td>
            <td class="px-6 py-4 whitespace-normal border-b border-gray-200">
                <div class="text-sm leading-5 text-gray-900"><?php echo $donnees['prenom']; ?></div>
            </td>
            
            <td class="p-3 px-5 whitespace-normal border-b border-gray-200 flex justify-end">
                <button type="button" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                    <a href="selectopen.php?pid=<?php echo $donnees['pid'] ;?>" class=" focus:outline-none focus:underline">Pointer</a>
                </button>
            </td>
            
        </tr>
                  
                    
                   
                     
<?php
    $i++;
    }
?>                            


    </tbody>
      </table>
    </div>
  <!-- </div> -->
</div>

