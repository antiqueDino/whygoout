<?php
    $title = 'Accueil';
    $h="Evenements fermes";
    include("navbar.php");

    

?>

        <div class="w-full px-6 py-12 bg-gray-100 border-t">

            <div class="container max-w-4xl mx-auto pb-10 flex flex-wrap">
                        <?php
                            $page = $_GET['page'] ?? 1;
                            $currentPage = (int)$page;
                            // if ($filter_var($page, FILTER_VALIDATE_INT)){
                            //     throw new Exception("Numero de page invalide", 1);
                            // }
                            if ($currentPage <= 0) {
                                throw new Exception("Numero de Page invalide", 1);
                            }
                            $total = (int)$db->query("SELECT COUNT(eid) FROM evenements")->fetch(PDO::FETCH_NUM)[0];
                            $perPage = 5;
                            $pages = ceil($total / $perPage);
                            // print_r($page);
                            if ($currentPage>$total) {
                                throw new Exception("Cette page n\'existe pas", 1);
                            }
                            $offset = $perPage * ($currentPage - 1);
                            // $format = 'd-m-Y H:i:s';
                            $SQL = "SELECT * FROM categories INNER JOIN evenements ON categories.cid = evenements.cid WHERE evenements.type='ferme' ORDER BY eid DESC LIMIT $offset, $perPage";
                            $event = $db->query($SQL);
                            if ($event->rowCount()==0) {
                        ?>
                            <div class="bg-red-lightest border border-red-light text-red-dark pl-4 pr-8 py-3 rounded relative" role="alert">
                                    <strong class="font-bold">Brbrbr!</strong>
                                    <span class="block sm:inline">Something seriously went wrong.No events-We are all contain!Covid19</span>
                                    <span class="absolute pin-t pin-b pin-r pr-2 py-3">
                                        <svg class="h-6 w-6 text-red" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                                    </span>
                            </div>
                        <?php
                            }else{
                                while ($events=$event->fetch()) {
                                    $debut = $events['dateDebut'];
                                    $fin =  $events['dateFin'];
                                    $eid = $events['eid'];
                        ?>
                        
                                <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 p-3 mb-4">
                                    <a href="#">
                                        <img src="https://images.unsplash.com/photo-1535585209827-a15fcdbc4c2d?w=800" class="w-full h-auto rounded-lg" />
                                    </a>

                                    <h2 class="text-base py-4">
                                        <?php echo htmlspecialchars($events['intitule']);?>
                                    </h2>


                                    <div class="mb-4 text-xs text-gray-700">
                                        From <?php echo date('d-m-Y H:i:s', strtotime($debut)); ?> to <?php echo date('d-m-Y H:i:s', strtotime($fin)); ?>
                                        <span class="font-bold mx-1"> | </span> <?php echo $events['nom'];?>
                                        <span class="font-bold mx-1"> | </span>
                                        <?php if($events['type']=='ferme'):?>
                                            <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path d="M4 8V6a6 6 0 1 1 12 0v2h1a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2h1zm5 6.73V17h2v-2.27a2 2 0 1 0-2 0zM7 6v2h6V6a3 3 0 0 0-6 0z"/>
                                            </svg>
                                        <?php else:?>
                                            <svg  width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path d="M4 8V6a6 6 0 1 1 12 0h-3v2h4a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2h1zm5 6.73V17h2v-2.27a2 2 0 1 0-2 0zM7 6v2h6V6a3 3 0 0 0-6 0z"/>
                                            </svg>
                                        <?php endif; ?>
                                    </div>

                                    <p class="text-sm leading-normal"><?php echo htmlspecialchars($events['description']);?>.</p>
                                </div>
                    <?php 
                                }
                            }
                        $event->closeCursor();
                    ?>
                </div>

                <div class="container max-w-4xl mx-auto pb-10 flex justify-between items-center px-3">
				<div class="text-xs">
                    <?php if($currentPage > 1): ?>
					    <a href="openEvent.php?page=<?php echo ($currentPage -1) ?>" class="bg-gray-500 text-white no-underline py-1 px-2 rounded-lg mr-2">Previous</a>
                    <?php endif; ?>
					<!-- <div class="hidden md:inline">
						<a href="#" class="text-sm px-1 text-gray-900 no-underline">1</a>
						<a href="#" class="text-sm px-1 text-gray-900 no-underline">2</a>
						<a href="#" class="text-sm px-1 text-gray-900 no-underline">3</a>
						<span class="px-2 text-gray">...</span>
						<a href="#" class="text-sm px-1 text-gray-900 no-underline">42</a>
					</div> -->
                    <?php if($currentPage < $pages): ?>
                        <a href="openEvent.php?page=<?php echo ($currentPage + 1) ?>" class="bg-black text-white no-underline py-1 px-2 rounded-lg ml-2">Next</a>
                    <?php endif; ?>
					

				</div>

			</div>
        </di>
			

			
