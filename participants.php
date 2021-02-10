<?php
   if(!isset($_GET['eid'])){
        header('Location: selecteve.php');
    }

    require("auth/EtreAuthentifie.php");

    $eid = $_GET['eid'];

    $SQL = "SELECT intitule FROM evenements WHERE eid = ? ";
    $st=$db->prepare($SQL);
    $st->execute([$eid]);
    if ($st->rowCount()==0) {
      header('Location: selecteve.php');
    }else {
      $resu = $st->fetch();
      $h = "Pointage à ".$resu['intitule'];
    }

    include("navbar.php");

    $SQL = "SELECT  * FROM participations pa INNER JOIN personnes pe ON pa.pid=pe.pid WHERE pa.eid = ? ORDER BY pa.date DESC";
    $st=$db->prepare($SQL);
    $st->execute([$eid]);
    
?>

<div class="relative mx-auto w-1/2 m-8">
  <div class="border-r-2 border-gray-500 mx-auto absolute h-full top-0" style="left: 15px"></div>
  <ul class="list-none mx-auto m-0 p-0">
    <?php 
      while ($resu= $st->fetch()) {
        
    ?>
      <li class="mb-2 mx-auto">
        <div class="flex items-center mb-1">
          <div class="bg-gray-500 rounded-full h-8 w-8"></div>
          <div class="flex-1 ml-4 font-medium"><?php echo $resu['date']; ?></div>
        </div>
        <div class="ml-12">
          <?php echo $resu['nom']." ".$resu['prenom']; ?>
        </div>
      </li>
    <?php }?>
    <!-- <li class="mb-2">
      <div class="flex items-center mb-1">
        <div class="bg-gray-500 rounded-full h-8 w-8"></div>
        <div class="flex-1 ml-4 font-medium">Nov 2017 - Multiple Releases</div>
      </div>
      <div class="ml-12">
        v0.1.0 - v0.2.2
      </div>
    </li>
    <li class="mb-2">
      <div class="flex items-center mb-1">
        <div class="bg-gray-500 rounded-full h-8 w-8"></div>
        <div class="flex-1 ml-4 font-medium">Feb 2018 - Other stuff happened</div>
      </div>
      <div class="ml-12">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus perspiciatis facilis deserunt excepturi sunt pariatur consequuntur eveniet molestias ea quia? Magni veniam illo optio tempora modi exercitationem qui adipisci ex.
      </div>
    </li>
    <li class="mb-2">
      <div class="flex items-center mb-1">
        <div class="bg-gray-500 rounded-full h-8 w-8"></div>
        <div class="flex-1 ml-4 font-medium">July 2018 - More stuff happened</div>
      </div>
      <div class="ml-12">
        Consequuntur odit explicabo officiis veniam incidunt non velit ex consectetur magnam minima vero hic impedit cumque, blanditiis autem distinctio facere dolor atque facilis, eos, labore sunt iusto. Beatae, quas, dolorem?
      </div>
    </li> -->
  </ul>
</div>