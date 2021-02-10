<?php
    require_once("auth/EtreAuthentifie.php");
    // if ($idm->getRole()!="admin") {
    //     redirect($pathFor["acceuil.php"]);
    // }

    $title = "Identifiant";
    $h = "Identifiants";
    include("navadmin.php");

    $i=1;

    $SQL= "SELECT * FROM itypes ORDER BY tid ASC ";
    $reponse= $db->query($SQL);
?>
<div class="flex flex-row items-center justify-between">
<button class="flex flex-row bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    <svg class="inline-block flex" width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M11 9h4v2h-4v4H9v-4H5V9h4V5h2v4zm-1 11a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16z"/>
                    </svg>
                    <span class="flex inline-block px-2">
                        <a class="inline-block align-baseline font-bold text-base text-gey-400 hover:text-grey-800" href="id_form.php">
                            Add
                        </a>
                    </span>
                </button>
            </div>
<div class="flex flex-col pb-2 px-3">
        
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
            
            </th>
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
          </tr>
        </thead>
        <tbody class="bg-white">
<?php

    while ($donnees=$reponse->fetch()) {
        
?>

        <tr>
            <td class=" px-6 py-4 whitespace-normal border-b border-gray-200">
                <div class="ml-4">
                  <div class="text-sm leading-5 font-medium text-gray-900"><?php echo $i ?></div>
              </div>
            </td>
            <td class="px-6 py-4 whitespace-normal border-b border-gray-200">
              <div class="text-sm leading-5 text-gray-900"><?php echo $donnees['nom']; ?></div>
            </td>
            <td class="py-4 px-5 whitespace-normal border-b border-gray-200 flex justify-end">
                <button type="button" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                    <a href="modid.php?tid=<?php echo $donnees['tid'] ;?>" class=" focus:outline-none focus:underline">Modifier</a>
                </button>
                <button type="button" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                    <a href="deleteid.php?tid=<?php echo $donnees['tid'] ;?>" class=" focus:outline-none focus:underline">Supprimer</a>   
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
  </div>
</div>


