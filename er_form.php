<?php
    $title = 'Inscription à un évènement';
    $h = "Inscrire la personne";
    include("navbar.php");

    //vérification d'existence données passées par l'url
    if(!isset($_GET['eid'])){
        header('Location: openEvent.php');
    }

  
    $eid = $_GET['eid'];

    $SQL = "SELECT * FROM evenements WHERE eid =?";
    $st = $db->prepare($SQL);
    $st->execute([$eid]);
    if($st->rowCount() ==0){
        redirect($pathFor['acceuil']);
    }else{
?>

        <div class="container max-w-4xl mx-auto pb-10 px-12 md:px-0">
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
            <div class="w-full mx-auto md:w-1/2 p-4">
                
                <form action ="er.php" method="post" >
                    <fieldset class="mb-4">
                        <label class="block text-sm text-gray-dark pb-2">Nom</label>
                        <input class="block w-full border rounded py-2 px-3 text-sm text-gray-700" type="text" name="nom" placeholder="Doe" required />
                        <p class="text-xs pt-2 text-gray">This is some helper text...</p>
                    </fieldset>

                    <fieldset class="mb-4">
                        <label class="block text-sm text-gray-dark pb-2">Prenom</label>
                        <input class="block w-full border rounded py-2 px-3 text-sm text-gray-700" type="text" name="prenom" placeholder="Jane" required/>
                    </fieldset>

                    <!-- <fieldset class="mb-4">
                        <label class="block text-sm text-gray-dark pb-2">Identifiant</label>
                        <input class="block w-full border rounded py-2 px-3 text-sm text-gray-700" type="text" placeholder="0B4589229" name="id" required />
                    </fieldset> -->

                    <input type="hidden" name="eid"  value="<?php echo $eid?>" />

                        <div class="-mx-3 md:flex mb-4">
                            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-state">
                                    Type d'identifiant
                                </label>
                                <div class="relative">
                                    <select class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-gray-700 py-3 px-4 pr-8 rounded" id="grid-state" name="typeid" required>
                                        <?php 
                                            $reponse = $db->query("SELECT * FROM itypes");
                                            while ($donnees=$reponse->fetch()) {
                                        ?>
                                                <option value="<?php echo $donnees['tid']; ?>"> 
                                                    <?php echo $donnees['nom']; ?>
                                                </option>
                                        <?php
                                                }
                                        ?>
                                    </select>
                                    <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                    </div>
                                </div>
                            </div>

                            <div class="md:w-1/2 px-3">
                                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-city">
                                    Identifiant
                                </label>
                                <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-city" type="text" required name = "id" placeholder="4KOB4569#">
                            </div> 
                        </div>   

                        <button class="text-sm mx-auto py-2 px-3 bg-black text-white rounded"> Soumettre </button>
                </form>

            </div>
        </di>

    <?php }?>