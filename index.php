<?php

// Contrôleur frontal : instancie un routeur pour traiter la requête entrante

require 'outils/Routeur.php';

$routeur = new Routeur();
$routeur->routerRequete();


