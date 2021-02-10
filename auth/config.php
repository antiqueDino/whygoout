<?php

$authTableData = [
    'table' => 'users',
    'idfield' => 'login',
    'cfield' => 'mdp',
    'uidfield' => 'userid',
    'rfield' => 'role',
];

$pathFor = [
    "login"  => "/whygoout/login.php",
    "logout" => "/whygoout/logout.php",
    "adduser" => "/whygoout/adduser.php",
    "eventForm" => "/whygoout/er_form.php",
    "acceuil" => "/whygoout/acceuil.php",
    "root"   => "/whygoout/acceuil.php",
];

const SKEY = '_Redirect';