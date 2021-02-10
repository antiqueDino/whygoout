<?php
    require_once("auth/EtreAuthentifie.php");
   
    // if (isset($_GET[id])) {
    //   $SQL= "SELECT * FROM personnes INNER JOIN identifications ON personnes.pid=identifications.pid WHERE pid";
    // }

    $title = "Pointer des personnes inscrites à un évènement";
    $h = "Pointer des personnes inscrites à un évènement";
    include("navbar.php");

    $i = 1;
    $SQL= "SELECT * FROM personnes INNER JOIN identifications ON personnes.pid=identifications.pid";
    $reponse= $db->query($SQL);
?>

<div class="flex flex-col mx-auto">
        
<?php
                        if (!empty($error)) {
            ?>
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                    <div class="flex">
                        <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                        <div>
                            <p class="font-bold">Error in your login information</p>
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
              Identifiants
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
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                <div class="ml-4">
                  <div class="text-sm leading-5 font-medium text-gray-900"><?php echo $i; ?></div>
              </div>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
              <div class="text-sm leading-5 text-gray-900"><?php echo $donnees['nom']; ?></div>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                <div class="text-sm leading-5 text-gray-900"><?php echo $donnees['prenom']; ?></div>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                <div class="text-sm leading-5 text-gray-900"><?php echo $donnees['valeur']; ?></div>
            </td>
            <td class="p-3 px-5 whitespace-no-wrap border-b border-gray-200 flex justify-end">
                <button type="button" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                    <a href="selecteve.php?pid=<?php echo $donnees['pid'] ;?>" class=" focus:outline-none focus:underline">Pointer</a>
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
