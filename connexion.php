<?php
$title="Connexion";

?>
<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title??"" ?></title>
    <link rel="stylesheet" href="public\build\tailwind.css">
</head>

<body class="bg-green-800 flex content-center justify-center h-full items-center" style = "background-color: #777580; background-image: url(circuit-board.svg);">

    <div class="w-full max-w-xs container mx-auto">
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
        <form class="bg-gray-900 shadow-md min-w-full rounded-lg px-8 pt-6 pb-8 mb-4" action="login.php" method="post">
            <h1 class="text-2xl font-bold text-white text-center border-b">Connexion</h1>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="inputNom">
                    Login
                </label>
                <input class="shadow appearance-none bg-gray-700 border-gray-500 border rounded w-full py-2 px-3 text-white leading-tight focus:outline-none focus:shadow-outline" id="inputLogin" type="email" name="login" placeholder="jean@gmail.com" required required value="<?= $data['login']??"" ?>">
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="inputMDP">
                    Password
                </label>
                <input class="shadow appearance-none bg-gray-700 border border-gray-500 rounded w-full py-2 px-3 text-white mb-3 leading-tight focus:outline-none focus:shadow-outline" id="inputMDP" name="password" type="password" placeholder="******************" required>
                <p class="text-red-500 text-xs italic">Please enter a password.</p>
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-green-800 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Connexion
                </button>
                <a class="inline-block align-baseline font-bold text-sm text-white hover:text-green-600" href="inscription.php">
                    S'inscrire
                </a>
            </div>
        </form>
        <p class="text-center text-gray-500 text-xs">
            &copy;2020 Acme Corp. All rights reserved.
        </p>
    </div>
    
</body>
</html>