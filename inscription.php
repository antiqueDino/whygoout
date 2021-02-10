<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="public/build/tailwind.css">
</head>
<body class=" flex content-center justify-center h-full items-center" style = "background-color: #777580; background-image: url(circuit-board.svg);">
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
    <form class="w-full max-w-lg bg-gray-900 shadow-md rounded-lg px-8 pt-6 pb-8 mt-4 mb-5 justify-between container mx-auto" action="adduser.php" method="post">
        <h1 class="text-2xl font-bold text-white text-center border-b mb-2">Inscription</h1>
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
        
        <!-- <div class="flex flex-wrap -mx-3 mb-4">
            <div class="w-full md:w-1/2 px-3 mb-4 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="type">
                    Type d'identifiant
                </label>
                <div class="relative">
                    <select class="block appearance-none w-full bg-gray-700 border border-gray-200 text-gray-400 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="type" name="id_nom">
                        <option>Code Barre</option>
                        <option>No RFID</option>
                        <option>Passeport</option>
                        <option >Nom et Prénom</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                </div>
            <p class="text-red-500 text-xs italic">Please fill out this field.</p>
            </div>
            <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="id_value">
                    Valeur  d'identifiant
                </label>
                <input class="appearance-none block w-full bg-gray-700 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="id_value" type="text" name="id_value" placeholder="C9HTLOI289642">
            </div>
        </div> -->
        <div class="flex items-center justify-between">
            <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                S'inscrire
            </button>
            <a class="inline-block align-baseline font-bold text-lg text-white hover:text-green-600" href="connexion.php">
                Se connecter
            </a>
        </div>
    </form>
</body>
</html>