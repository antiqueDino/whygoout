<?php
    //page d'ajout d'un nouvel utilisateur
      $title = "Ajouter utilisateur";
      $h = "Ajouter utilisateur";
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
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                <div class="flex">
                    <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                    <div>
                        <!-- <p class="font-bold">Error in your login information</p> -->
                        <p class="text-sm">
                        <?php                       
                                echo "<p class=\"error font-bold text-base\">".($error??"")."</p>";
                        ?>
                        </p>
                    </div>
                </div>
            </div>
<?php
                    }
?>  
    <form class="w-full max-w-lg bg-gray-900 shadow-md rounded-lg px-8 pt-6 pb-8 mt-4 mb-5 justify-between container mx-auto" action="nuser.php" method="post">
        <!-- <h1 class="text-2xl font-bold text-white text-center border-b mb-2">Ajou</h1> -->
        <div class="flex flex-wrap -mx-3 mb-4">
            <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="inputLogin">
                Login
            </label>
            <input class="appearance-none block w-full bg-gray-700 text-gray-500 border  border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="inputLogin" type="email" name="login" placeholder="jean@gmail.com" required value="<?= $data['login']??""?>">
            </div>
        </div>
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
        <div class="flex flex-wrap -mx-3 mb-4">
            <div class="mt-1">
                <span class="text-gray-700 uppercase tracking-wide text-gray-700 text-xs font-bold">Type de compte</span>
                <div class=" flex items-center justify-between mt-2">
                        <label class="inline-flex justify-center uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="role">
                            <input type="radio" class="form-radio " name="role" value="admin" required value="<?= $data['role']??""?>">
                            <span class="ml-2 text-white">Administrateur</span>
                        </label>
                    <label class="inline-flex justify-center ml-6 uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                            <input type="radio" class="form-radio" name="role" value="user" checked="checkeed" required value="<?= $data['role']??""?>">
                            <span class="ml-2 text-white">Participant</span>
                    </label>
                </div>
            </div>
        </div>

        <div class="flex mx-auto items-center justify-between">
            <button class="bg-green-600 mx-auto hover:bg-grey text-green-600 font-bold py-2 px-4 rounded inline-flex items-center">
                <svg  class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M2 6H0v2h2v2h2V8h2V6H4V4H2v2zm7 0a3 3 0 0 1 6 0v2a3 3 0 0 1-6 0V6zm11 9.14A15.93 15.93 0 0 0 12 13c-2.91 0-5.65.78-8 2.14V18h16v-2.86z"/>
                    </svg>
                   <span class="ml-2 text-white"> Ajouter</span>
            </button>
        </div>
       

        
    </form>
</div>
