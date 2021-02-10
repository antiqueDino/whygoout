<?php
    require_once("auth/EtreAuthentifie.php");
    // if ($idm->getRole()!="admin") {
    //     redirect($pathFor["acceuil.php"]);
    // }

    $title = "Personnes";
    $h = "Listes des personnes";
    include("navadmin.php");

    $SQL= "SELECT * FROM personnes ";
    $reponse= $db->query($SQL);
?>
<div class="flex flex-row items-center justify-between">
<button class="flex bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M2 6H0v2h2v2h2V8h2V6H4V4H2v2zm7 0a3 3 0 0 1 6 0v2a3 3 0 0 1-6 0V6zm11 9.14A15.93 15.93 0 0 0 12 13c-2.91 0-5.65.78-8 2.14V18h16v-2.86z"/>
                    </svg>
                    <span class="flex px-2">
                        <a class="inline-block align-baseline font-bold text-sm text-gey-400 hover:text-grey-800" href="addpers_form.php">
                            Add
                        </a>
                    </span>
                </button>
            </div>
<div class="flex flex-col">
        
  <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
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
                  <div class="text-sm leading-5 font-medium text-gray-900"><?php echo $donnees['pid']; ?></div>
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
                    <a href="modpers.php?pid=<?php echo $donnees['pid'] ;?>" class=" focus:outline-none focus:underline">Modifier</a>
                </button>
                <button type="button" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                    <a href="deletepeople.php?pid=<?php echo $donnees['pid'] ;?>" class=" focus:outline-none focus:underline">Supprimer</a>   
                </button>
            </td>
            
        </tr>
                  
                    
                   
                     
<?php
    }
?>                            


    </tbody>
      </table>
    </div>
  </div>
</div>

