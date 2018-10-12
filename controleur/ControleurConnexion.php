<?php

/**
 * Created by PhpStorm.
 * User: smach
 * Date: 10/12/2018
 * Time: 1:52 AM
 */

require_once 'outils/Controleur.php';
require_once 'modele/Utilisateur.php';

class ControleurConnexion extends Controleur {

    private $user;

    public function __construct() {
        $this->user = new Utilisateur();
    }


    public function index() {
        $this->genererVue(array());
    }

    public function check() {

        $surnom = $this->requete->getParametre("surnom");
        $mdp = $this->requete->getParametre("mdp");

        if ( isset($_POST['login']) )
        {
            if (!is_null($this->user->chercherUtilisateur($surnom,$mdp))) {
                echo "login";
            }else{
                throw new Exception("les données de connexion sont incorrectes");
            };

        }else if (isset($_POST['sign_up']) ){
            $user = $this->user->chercherUtilisateurParSurnom($surnom);
            if (is_null($user)) {
                $this->user->ajouterUtilisateur($surnom,$mdp);
                echo "signup";
            };

        }
        // Exécution de l'action par défaut pour réafficher la liste des billets
//        $this->executerAction("index");


    }

}