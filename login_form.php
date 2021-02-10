<?php
$title="Authentification";
include("header.php");

?>
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
    <div class='center'>
        <h2>Authentifiez-vous</h2>

                    <form  class="w-full max-w-lg bg-gray-900 shadow-md rounded-lg px-8 pt-6 pb-8 mt-4 mb-5 justify-between container mx-auto" method="post">
                        <!--legend>Authentifiez-vous</legend-->
                        <table class="center">
                            <tr>
                            <td><label for="inputNom" class="control-label">Login</label></td>
                            <td><input type="text" name="login" size="20" class="form-control" id="inputLogin" required placeholder="login"
                                   required value="<?= $data['login']??"" ?>"></td>
                            </tr>
                            <tr>
                            <td><label for="inputMDP" class="control-label">MDP</label></td>
                            <td><input type="password" name="password" size="20" class="form-control" required id="inputMDP"
                                   placeholder="Mot de passe"></td>
                            </tr>
                        </table>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Connexion</button>
                            <span class="pull-right"><a href="<?= $pathFor['adduser'] ?>">S'enregistrer</a></span>
                        </div>
                    </form>
    </div>
