<?php

require_once 'outils/Controleur.php';
require_once 'modele/Utilisateur.php';

class ControleurAccueil extends Controleur {

    private $user;

    public function __construct() {
       $this->user = new Utilisateur();
    }


    public function index() {
        $this->genererVue(array());
    }
}

