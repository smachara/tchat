<?php

require_once 'outils/ControleurSecurise.php';

require_once 'modele/Utilisateur.php';
require_once 'modele/Message.php';

class ControleurChat extends ControleurSecurise {

    private $user;
    private $message;

    public function __construct() {
        $this->user = new Utilisateur();
        $this->message = new Message();
    }


    public function index() {

        $this->genererVue(array());
    }
}
