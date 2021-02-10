<?php
    require_once("auth/EtreAuthentifie.php");
   
    $SQL = "SELECT * FROM users WHERE login =?";
    $st=$db -> prepare($SQL);
    $st->execute([$idm->getIdentity()]);
    $resu = $st->fetch();

    $title = "Profile";
    include("navbar.php");

  
?>


<div class="bg-white mx-auto shadow overflow-hidden sm:rounded-lg">
  <div class="px-4 py-5 border-b mx-auto border-gray-200 sm:px-6">
    <h3 class="text-lg leading-6 font-medium text-gray-900">
       Information Utilisateur
    </h3>
    <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
      Details des evenements et informations utilisateur
    </p>
  </div>
  <div>
    <dl>
      <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm leading-5 font-medium text-gray-500">
          Uid
        </dt>
        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
          <?php 
            echo $resu['uid']; 
          ?>
        </dd>
      </div>
      <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm leading-5 font-medium text-gray-500">
          Login
        </dt>
        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
          <?php
            echo $idm->getIdentity();
          ?>
        </dd>
      </div>
      <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm leading-5 font-medium text-gray-500">
          Role
        </dt>
        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
          <?php
            echo $idm->getRole();
          ?>
        </dd>
      </div>
      
    </dl>
  </div>
</div>