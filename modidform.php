<?php
    // require_once("auth/EtreAuthentifie.php");
    // if ($idm->getRole()!="admin") {
    //     redirect($pathFor["acceuil.php"]);
    // }

    $title = "Modifier un identifiant";
    $h = "Modifier l'identifiant";
    include("navadmin.php");

?>

<?php
                    if (!empty($error)) {
        ?>
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                <div class="flex">
                    <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                    <div>
                        <!-- <p class="font-bold">Error in your modifying information</p> -->
                        <p class="font-bold">
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

<form class="w-full mx-auto max-w-sm my-8" method="post" action="">
  <div class="flex items-center mx-auto border-b border-b-2 border-teal-500 py-2">
    <input class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="Nom de l'identifiant" aria-label="Nom d'id" name="id" required>
    <button class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded" type="submit">
      Modifier
    </button>
  </div>
</form>
