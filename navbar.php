<?php
require_once("auth/loader.php");
include("header.php");
?>

<!-- header -->
  <!-- <h -->
		<!-- /header -->

		<!-- nav -->
		
		<!-- /nav -->




<!-- nav -->
<nav class="flex items-center justify-between flex-wrap bg-gray-200 p-6 border-b  w-full z-10 pin-t">
		<div class="flex items-center flex-no-shrink tex-gray-600 mr-6">
			<a class="text-gray-800 no-underline hover:tex-gray-600 hover:no-underline" href="home.php">
				GO OUT 
			</a>
		</div>

		<div class="block lg:hidden">
			<button id="nav-toggle" class="flex items-center px-3 py-2 border rounded text-grey border-grey-dark hover:tex-gray-600 hover:border-white">
				<svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
			</button>
		</div>

		<div class="w-full flex-grow lg:flex lg:items-center lg:w-full hidden lg:block pt-6 lg:pt-0" id="nav-content">
			<ul class="list-reset lg:flex justify-end flex-1 items-center">
				<li class="mr-3">
					<a class="inline-block py-2 px-4 tex-gray-600 no-underline" href="acceuil.php">Accueil</a>
				</li>
				<li class="mr-3">
					<a class="inline-block text-grey-dark no-underline hover:text-grey-lighter hover:text-underline py-2 px-4" href="openEvent.php">Evenements ouverts</a>
				</li>
				<li class="mr-3">
					<a class="inline-block text-grey-dark no-underline hover:text-grey-lighter hover:text-underline py-2 px-4" href="closedEvent.php">Evenements fermées</a>
				</li>
      </ul>
      <ul class="list-reset lg:flex justify-end flex-1 items-center">
        <?php if ($idm->hasIdentity()): ?>
		
		      <?php if ($idm->getRole()=="admin"): ?>
            <li class="mr-3">
              <a class="inline-block text-grey-dark no-underline hover:text-grey-lighter hover:text-underline py-2 px-4" href="tbeve.php">Dashboard</a>
            </li>
          <?php else: ?>
            <li class="mr-3">
              <a class="inline-block py-2 px-4 tex-gray-600 no-underline" href="perspoint.php">Pointer</a>
            </li>
            <li class="mr-3">
              <a class="inline-block text-grey-dark no-underline hover:text-grey-lighter hover:text-underline py-2 px-4" href="persinsc.php"> Personnes inscrites</a>
            </li>
            <li class="mr-3">
              <a class="inline-block text-grey-dark no-underline hover:text-grey-lighter hover:text-underline py-2 px-4" href="user_profile.php">Profile</a>
            </li>
          <?php endif; ?>
            <li class="mr-3">
              <a class="inline-block text-grey-dark no-underline hover:text-grey-lighter hover:text-underline py-2 px-4" href="logout.php">Deconnexion</a>
            </li>
         	<?php else: ?>
            <li class="mr-3">
              <a class="inline-block text-grey-dark no-underline hover:text-grey-lighter hover:text-underline py-2 px-4" href="inscription.php"> Inscription</a>
            </li>
            <li class="mr-3">
              <a class="inline-block text-grey-dark no-underline hover:text-grey-lighter hover:text-underline py-2 px-4" href="connexion.php">Connexion</a>
            </li>
          <?php endif; ?>

			</ul>
		</div>
	</nav>



	<script>
		//Javascript to toggle the menu
		document.getElementById('nav-toggle').onclick = function(){
			document.getElementById("nav-content").classList.toggle("hidden");
		}
	</script>

  <!-- fin nav -->

		<!-- title -->
		<h1 class="text-center text-xl md:text-4xl px-6 py-12 bg-white"><?= $h??"" ?></h1>
		<!-- /title -->