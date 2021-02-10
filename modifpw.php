<?php
    require_once("auth/EtreAuthentifie.php");
    //page d'ajout d'un nouvel utilisateur
      $title = "Changer mot de passe";
      $h = "Changer mot de passe";
      include("navadmin.php");
    
    // if (!isset($_GET['uid'])) {
    //     header('Location: allusers.php');
    //     exit;
    // }

    // $uid = $_GET['uid'];
    
    // $SQL= "SELECT * FROM users WHERE uid=? ";
    // $st = $db->prepare($SQL);
    // $st->execute([$uid]);
    // if ($st->rowCount()==0) {     
    //     header('Location: allusers.php');
    //     exit;
    // }

    

    if (!empty($error)) {
?>
<div class="flex flex-col">
            <div class="bg-teal-100 flex border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                <div class="flex">
                    <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                    <div>
                        <!-- <p class="font-bold">Error in your login information</p> -->
                        <p class="text-sm">
                        <?php                       
                                echo "<p class=\"error text-base font-bold\">".($error??"")."</p>";
                        ?>
                        </p>
                    </div>
                </div>
            </div>
<?php
                    }
?>  
    <form class="w-full max-w-lg bg-gray-900 shadow-md rounded-lg px-8 pt-6 pb-8 mt-4 mb-5 justify-between container mx-auto" action="" method="post">
        <!-- <h1 class="text-2xl font-bold text-white text-center border-b mb-2">Ajou</h1> -->
        
        <div class="flex flex-wrap -mx-3 mb-4">
            <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="inputMDP">
                Password
            </label>
            <input class="appearance-none block w-full bg-gray-700 text-gray-500 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="inputMDP" name="mdp" type="password" placeholder="******************" required value="">
            <p class="text-gray-600 text-xs italic">Make it as long and as crazy as you'd like</p>
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-4">
            <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="inputMDP2">
              Repeat Password
            </label>
            <input class="appearance-none block w-full bg-gray-700 text-gray-500 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="inputMDP" name="mdp2" type="password" placeholder="******************" required value="">
            <p class="text-gray-600 text-xs italic">Hope it's the same</p>
            </div>
        </div>

        <div class="flex mx-auto items-center justify-between">
            <button class="bg-green-600 mx-auto hover:bg-grey text-green-600 font-bold py-2 px-4 rounded inline-flex items-center" type="submit">
                <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M12.3 3.7l4 4L4 20H0v-4L12.3 3.7zm1.4-1.4L16 0l4 4-2.3 2.3-4-4z"/>
                </svg>
                <span class="ml-2 text-white"> Modifier</span>
            </button>
        </div>
       

        
    </form>
</div>
