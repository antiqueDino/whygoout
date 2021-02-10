<?php
    require_once("auth/EtreAuthentifie.php");
    // if ($idm->getRole()!="admin") {
    //     redirect($pathFor["acceuil.php"]);
    // }

    $title = "Ajouter un évènement";
    $h = "Ajouter un évènement";
    include("navadmin.php");


?>

<form class=" rounded-lg px-8 pt-6 pb-8 mt-4 mb-5  container mx-auto" action="neweve.php" method="post">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
    <div class="-mx-3 md:flex mb-6">
        <div class="md:w-full px-3">
        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
            Intitule
        </label>
        <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" id="grid-password" type="text" placeholder="Examen" name="titre">
        <p class="text-grey-dark text-xs italic">Make it as small and as crazy as you'd like</p>
        </div>
    </div>
    <div class="-mx-3 md:flex mb-6">
        <div class="md:w-full px-3">
        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
            Description
        </label>
        <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" id="grid-password" type="text" placeholder="Description de votre évènement" name="desc">
        <!-- <p class="text-grey-dark text-xs italic">Make it as small and as crazy as you'd like</p> -->
        </div>
    </div>
    <div class="-mx-3 md:flex mb-2">
        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-city">
            Date de début
        </label>
        <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-city" type="datetime-local" placeholder="2020-06-01R08:30" name="dday">
        </div>
        <div class="md:w-1/2 px-3">
        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-state">
            Catégorie
        </label>
        <div class="relative">
            <select class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" name="cat" id="grid-state">
                <?php
                    $SQL= "SELECT * FROM categories";
                    $reponse= $db->query($SQL);
                    while($donnees = $reponse->fetch()){  
                ?>
                    <option value="<?php echo $donnees['cid'] ;?>"> <?php echo $donnees['nom'] ;?> </option>
                <?php }?>
            </select>
            <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
        </div>
        </div>
        <div class="md:w-1/2 px-3">
        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-zip">
            Date de fin
        </label>
        <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-zip" name="eday" type="datetime-local" placeholder="2020-07-01T17:40">
        </div>
        <div class="md:w-1/2 px-3">
        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-state">
            Type
        </label>
        <div class="relative">
            <select class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="grid-state" name="type">
                <option value="ferme">Ferme</option>
                <option value="ouvert">Ouvert</option>
            </select>
            <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
        </div>
        </div>
    </div>
    <div class="flex mx-auto items-center justify-between">
                <button class="bg-green-600 mx-auto hover:bg-grey text-green-600 font-bold py-2 px-4 rounded inline-flex items-center">
                <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M11 9h4v2h-4v4H9v-4H5V9h4V5h2v4zm-1 11a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16z"/>
                </svg>
                <span class="ml-2 text-white"> Ajouter</span> 
                    <!-- <svg  class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M2 6H0v2h2v2h2V8h2V6H4V4H2v2zm7 0a3 3 0 0 1 6 0v2a3 3 0 0 1-6 0V6zm11 9.14A15.93 15.93 0 0 0 12 13c-2.91 0-5.65.78-8 2.14V18h16v-2.86z"/>
                        </svg>
                    <span class="ml-2 text-white"> Ajouter</span> -->
                </button>
        </div>
    </div>
</form>


