<?php
    //liste des évènements
    // require_once("auth/EtreAuthentifie.php");
    // if ($idm->getRole()!="admin") {
    //     redirect($pathFor["acceuil.php"]);
    // }

    $title = "Evenements";
    $h = "Liste des évènements  ";
    include("navadmin.php");

    $SQL= "SELECT * FROM evenements e INNER JOIN categories c WHERE e.cid = c.cid";
    $reponse= $db->query($SQL);
    if ($reponse->rowCount()!=0) {
?>


<div class="flex flex-row items-center justify-between">
<button class="flex flex-row bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    <svg class="inline-block flex" width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M2 2c0-1.1.9-2 2-2h12a2 2 0 0 1 2 2v18l-8-4-8 4V2zm2 0v15l6-3 6 3V2H4zm5 5V5h2v2h2v2h-2v2H9V9H7V7h2z"/>
                </svg>
                <span class="flex inline-block px-2">
                        <a class="inline-block align-baseline font-bold text-sm text-white hover:text-grey-800" href="addeve.php">
                            Add
                        </a>
                    </span>
                </button>
            </div>

  <div class="flex flex-col pb-2">
  <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
    <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
      <table class="min-w-full">
        <thead>
          <tr>
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
              Intitule
            </th>
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
              Description
            </th>
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
              Categories
            </th>
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
              Date de debut
            </th>
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
              Date de fin
            </th>
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
              Type
            </th>
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
          </tr>
        </thead>
        <tbody class="bg-white">
<?php

    while ($donnees=$reponse->fetch()) {
        $debut = $donnees['dateDebut'];
        $fin =  $donnees['dateFin'];
        $eid = $donnees['eid'];
        
?>

        <tr>
            <td class="px-6 py-4 whitespace-normal border-b border-gray-200">
                <div class="ml-4">
                  <div class="text-sm leading-5 font-medium text-green-500"><a href="subto.php?eid=<?php echo $donnees['eid'] ;?>" class="hover:text-green-600 focus:outline-none focus:underline" title = " Cliquer pour inscrire des personnes à cet évènement"> <?php echo $donnees['intitule']; ?> </a>  </div>
              </div>
            </td>
            <td class="px-6 py-4 whitespace-normal border-b border-gray-200">
              <div class="text-sm leading-5 text-gray-900"><?php echo $donnees['description']; ?></div>
            </td>
            <td class="px-6 py-4 whitespace-normal border-b border-gray-200">
                <div class="text-sm leading-5 text-gray-900"><?php echo $donnees['nom']; ?></div>
            </td>
            <td class="px-6 py-4 whitespace-normal border-b border-gray-200">
                <div class="ml-4">
                  <div class="text-sm leading-5 font-medium text-gray-900">
                        <?php if($donnees['type']=='ferme'):?>
                            <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M4 8V6a6 6 0 1 1 12 0v2h1a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2h1zm5 6.73V17h2v-2.27a2 2 0 1 0-2 0zM7 6v2h6V6a3 3 0 0 0-6 0z"/>
                            </svg>
                        <?php else:?>
                            <svg  width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M4 8V6a6 6 0 1 1 12 0h-3v2h4a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2h1zm5 6.73V17h2v-2.27a2 2 0 1 0-2 0zM7 6v2h6V6a3 3 0 0 0-6 0z"/>
                            </svg>
                        <?php endif; ?>
                  </div>
              </div>
            </td>
            <td class="px-6 py-4 whitespace-normal border-b border-gray-200">
                <div class="text-sm leading-5 text-gray-900">
                    <?php echo date('d-m-Y H:i:s', strtotime($debut)); ?>
                </div>
            </td>
            <td class="px-6 py-4 whitespace-normal border-b border-gray-200">
                <div class="text-sm leading-5 text-gray-900">
                    <?php echo date('d-m-Y H:i:s', strtotime($fin)); ?>
                </div>
            </td>
            <td  class="py-4 px-5 whitespace-normal border-b border-gray-200 flex justify-end">
                <button type="button"  class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                    <a href="modifeve.php?eid=<?php echo $donnees['eid'] ;?>" class=" focus:outline-none focus:underline">Modifier</a>
                </button>
                <button type="button" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                    <a href="deleve.php?eid=<?php echo $donnees['eid'] ;?>" class=" focus:outline-none focus:underline">Supprimer</a>   
                </button>
            </td>
        </tr>
                  
                    
                   
                     
<?php
        }
    }
?>                            


    </tbody>
      </table>
    </div>
  </div>
</div>
