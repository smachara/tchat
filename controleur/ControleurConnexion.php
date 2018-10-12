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

        if ($this->requete->existeParametre("surnom") &&
            $this->requete->existeParametre("mdp")) {

            $surnom = $this->requete->getParametre("surnom");
            $mdp = $this->requete->getParametre("mdp");

            if ( isset($_POST['login']) )
            {
                $user = $this->user->chercherUtilisateur($surnom,$mdp);
                if (!is_null($user)) {

                    $this->requete->getSession()->setAttribut("idUtilisateur",
                        $user['idUtilisateur']);
                    $this->requete->getSession()->setAttribut("surnom",
                        $user['surnom']);
                    $this->rediriger("Chat");
                }else{
                    throw new Exception("les données de connexion sont incorrectes");
                    $this->rediriger("Accueil");
                };

            }else if (isset($_POST['sign_up']) ){
                $user = $this->user->chercherUtilisateurParSurnom($surnom);
                if (is_null($user)) {
                    $this->user->ajouterUtilisateur($surnom,$mdp);
                    echo "signup"; die();
                }else {
                    throw new Exception("L'utilisateur existe déjà");
                    $this->rediriger("Accueil");
                }
            }
        }



    }

}