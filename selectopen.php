<?php
    //liste des évènements
    require_once("auth/EtreAuthentifie.php");
    // if ($idm->getRole()!="admin") {
    //     redirect($pathFor["acceuil.php"]);
    // }
    // require_once("auth/loader.php");

    $title = "Choisir l'évènement";
    if (!isset($_GET["pid"])) {
        header('Location: perspoint.php');
    }
    $pid = $_GET["pid"];

    
    $SQL="SELECT * FROM personnes WHERE pid=?";
    $st=$db->prepare($SQL);
    $st->execute([$pid]);
    $resu = $st->fetch();
    if ($st->rowCount()!=0) {
        $h = "Choisir l'évènement ouvert de : ".$resu['nom']." ".$resu['prenom'];
        
    }else{
        $h = "Choisir l'évènement ouvert";
    }
    include("navbar.php");

    $i=1;
    $SQL= "SELECT * FROM evenements e INNER JOIN categories c ON e.cid = c.cid WHERE e.type= 'ouvert' ";
    $reponse= $db->query($SQL);
    if ($reponse->rowCount()!=0) {
?>



<div class="flex py-3 mx-auto">
  <!-- <div class="-my-2 py-2 overflow-x-auto mx-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8"> -->
    <div class="align-middle inline-block min-w-auto mx-auto shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
      <table class="min-w-auto mx-auto">
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
                  <div class="text-sm leading-5 font-medium text-gray-500"> <?php echo $donnees['intitule']; ?>   </div>
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
            <td class="px-6 py-4 whitespace-normal text-right text-sm leading-5 font-medium">
                    <a href="checkid.php?eid=<?php echo $donnees['eid'] ;?>&amp;pid=<?php echo $pid ;?>" class="text-indigo-600 hover:text-indigo-900 focus:outline-none focus:underline">Valider</a>
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

