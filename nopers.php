<?php
    //page affichant les inscriptions non participées par personnes...point6
    require_once("auth/EtreAuthentifie.php");
    // if ($idm->getRole()!="admin") {
    //     redirect($pathFor["acceuil.php"]);
    // }
    require_once("auth/loader.php");
    $title = "Nopers";
    if (!isset($_GET["pid"])) {
        redirect($pathFor["acceuil"]);
    }

    $pid = $_GET["pid"];
    

    $SQL= "SELECT  DISTINCT nom, prenom FROM personnes  WHERE pid=? ";
    $st = $db->prepare($SQL);
    $st->execute([$pid]);
    if ($st->rowCount()==0) {     
        echo "Participant inexistant!";
        redirect($pathFor["acceuil"]);
    }
    
    $row = $st->fetch();
    $h = "Inscriptions non participées de: ".$row['nom']." ".$row['prenom'];
    include("navadmin.php");


    $SQL="SELECT DISTINCT *FROM personnes p INNER JOIN inscriptions i on p.pid=i.pid inner join evenements e on i.eid = e.eid inner join categories c on e.cid=c.cid WHERE p.pid=? and p.pid not in (select pid from participations )";
    $st = $db->prepare($SQL); 
    $st->execute(array($pid));
    if ($st->rowCount()!=0) {

?>

<div class="flex flex-col">
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
              Type
            </th>
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
              Date de debut
            </th>
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
              Date de fin
            </th>
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
          </tr>
        </thead>
        <tbody class="bg-white">
<?php
     while ($donnees=$st->fetch()) {
        $debut = $donnees['dateDebut'];
        $fin =  $donnees['dateFin'];

?>
        <tr>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                <div class="ml-4">
                  <div class="text-sm leading-5 font-medium text-gray-900"><?php echo $donnees['intitule']; ?></div>
              </div>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
              <div class="text-sm leading-5 text-gray-900"><?php echo $donnees['description']; ?></div>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                <div class="text-sm leading-5 text-gray-900"><?php echo $donnees['nom']; ?></div>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
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
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                <div class="text-sm leading-5 text-gray-900">
                    <?php echo date('d-m-Y H:i:s', strtotime($debut)); ?>
                </div>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                <div class="text-sm leading-5 text-gray-900">
                    <?php echo date('d-m-Y H:i:s', strtotime($fin)); ?>
                </div>
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

