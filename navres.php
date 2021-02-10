<?php
$title="Menu2";
include("trame_auth\header.php");
?>

<header class= "bg-gray-900">
    <div class="flex items-center justify-between px-4 py-3">
        <div>
            <img class="h-12 pl-2" src="logo.jpg" alt="Go Out">
        </div>
        <div >
            <button type="button" class="block text-gray-500 hover:text-white focus:text-white focus:outline-none" id="hamburgerbtn">
                <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"/>
                </svg>
            </button>
        </div>
    </div>
    <div class="px-2 pt-2 pb-4" id="mobileMenu">
        <a href="#" class="block px-2 py-1 text-white font-semibold rounded hover:bg-gray-800">Acceuil</a>
        <a href="#" class="mt-1 block px-2 py-1 text-white font-semibold rounded hover:bg-gray-800">Evenements ouverts</a>
        <a href="#" class="mt-1 block px-2 py-1 text-white font-semibold rounded hover:bg-gray-800">Evenements fermés</a>
    </div>
</header>

<style>
    .active{
        display: block;
    }    
</style>

<script>
    let hamburger = document.getElementById('hamburgerbtn');

    let mobileMenu = document.getElementById('mobileMenu');

    hamburger.addEventListener('click', function(){
        mobileMenu.classList.toggle('active');
    });
</script>