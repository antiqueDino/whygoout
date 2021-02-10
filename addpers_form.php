<?php
    require_once("auth/EtreAuthentifie.php");
    // if ($idm->getRole()!="admin") {
    //     redirect($pathFor["acceuil.php"]);
    // }

    $title = "Ajouter une personne";
    $h = "Ajouter une personne";
    include("navadmin.php");

    $SQL= "SELECT * FROM itypes";
    $reponse= $db->query($SQL);
?>

        <?php
                    if (!empty($error)) {
        ?>
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                <div class="flex">
                    <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                    <div>
                        <!-- <p class="font-bold">Error in your login information</p> -->
                        <p class="text-sm">
                        <?php                       
                                echo "<p class=\"error font-bold\">".($error??"")."</p>";
                        ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php
                        }
        ?>       

<form class="w-full max-w-lg bg-gray-900 shadow-md rounded-lg px-8 pt-6 pb-8 mt-4 mb-5 justify-between container mx-auto" action="addpers.php" method="post">
  <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
        Nom
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Jane"  name="nom" required value="<?= $data['nom']??""?>">
      <p class="text-red-500 text-xs italic">Please fill out this field.</p>
    </div>
    <div class="w-full md:w-1/2 px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
        Prenom
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Doe"  name="prenom" required value="<?= $data['prenom']??""?>">
    </div>
  </div>

  <div class="flex flex-wrap -mx-3 mb-2">

    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
        Type d'identifiant
      </label>
      <div class="relative">
        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-800 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state" name="typeid" required>
          <?php while($donnees = $reponse->fetch()){  ?>
            <option value="<?php echo $donnees['tid'] ;?>"> <?php echo $donnees['nom'] ;?> </option>
          <?php }?>
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
          <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
        </div>
      </div>
    </div>
    
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
        Identifiant
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-city" type="text" placeholder="Ax5486PO"  name="id" required value="<?= $data['identifiant']??""?>">
    </div>
  </div>
  <div class="flex pt-3 mx-auto items-center justify-between">
    <button class="bg-green-600 mx-auto hover:bg-grey text-green-600 font-bold py-2 px-4 rounded inline-flex items-center">
      <svg  class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
        <path d="M2 6H0v2h2v2h2V8h2V6H4V4H2v2zm7 0a3 3 0 0 1 6 0v2a3 3 0 0 1-6 0V6zm11 9.14A15.93 15.93 0 0 0 12 13c-2.91 0-5.65.78-8 2.14V18h16v-2.86z"/>
      </svg>
      <span class="ml-2 text-white"> Ajouter</span>
    </button>
  </div>
</form>

