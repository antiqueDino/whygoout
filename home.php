<?php
  require_once('auth/loader.php');
?>

<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="public\build\tailwind.css">
</head>
<body>


<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<style>
.star {
  position: absolute;
  width: 2px;
  height: 2px;
  border-radius: 5px;
}

@keyframes twinkle {
  0% {
    transform: scale(1, 1);
    background: rgba(255, 255, 255, 0);
    animation-timing-function: linear;
  }
  40% {
    transform: scale(0.8, 0.8);
    background: rgba(255, 255, 255, 1);
    animation-timing-function: ease-out;
  }
  80% {
    background: rgba(255, 255, 255, 0);
    transform: scale(1, 1);
  }
  100% {
    background: rgba(255, 255, 255, 0);
    transform: scale(1, 1);
  }
}
</style>

<section
      class="homescreen m-0 flex flex-col w-screen justify-center bg-gray-800 h-screen text-gray-100 "
    >
      <nav>
        <ul class="flex justify-between text-xl py-8 px-8 md:px-48 ">
          <li>
            GO OUT
          </li>
          <?php if ($idm->hasIdentity()): ?>
            <li>
              <a href="acceuil.php" target="_blank" rel="noopener noreferrer">Entrer</a>
            </li>
          <?php else: ?>
            <li>
              <a href="connexion.php" target="_blank" rel="noopener noreferrer">Entrer</a>
            </li>
          <?php endif; ?>  
          <li>
            <a href="acceuil.php" target="_blank" rel="noopener noreferrer">Accueil</a>
          </li>
        </ul>
      </nav>

      <h1 class="text-6xl  my-auto mx-auto  md:mx-48 ">
        Découvrer et gerer les evenements <br />
        <span class="text-teal-400">Confinement is over.</span>
      </h1>
    </section>
<script>
for (var i = 0; i < 100; i++) {
  var star =
    '<div class="star m-0" style="animation: twinkle ' +
    (Math.random() * 5 + 5) +
    's linear ' +
    (Math.random() * 1 + 1) +
    's infinite; top: ' +
    Math.random() * $(window).height() +
    'px; left: ' +
    Math.random() * $(window).width() +
    'px;"></div>';
  $('.homescreen').append(star);
}

</script>