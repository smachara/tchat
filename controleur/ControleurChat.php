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
        $idTo = $this->requete->getParametre("id");

        $idUtilisateur = $this->requete->getSession()->getAttribut("idUtilisateur");
        $surnomUtilisateur = $this->requete->getSession()->getAttribut("surnom");



        $messages = $this->message->getMessagesByUser($idUtilisateur, $idTo);
        $users = $this->user->getUsersWithoutSender($idUtilisateur);

        $current_receiver = $this->user->chercherUtilisateurParID($idTo);

        $this->updateMessageNotifications();

        $this->genererVue(array('messages'=>$messages,'users'=> $users ,'idUtilisateur'=>$idUtilisateur, 'surnomUtilisateur'=>$surnomUtilisateur, 'current_receiver'=> $current_receiver ));
    }


    public function envoyer() {

        $idTo = $this->requete->getParametre("id");
        $idUtilisateur = $this->requete->getSession()->getAttribut("idUtilisateur");
        $message = $this->requete->getParametre("message");
        $this->message->ajouterMessage($idUtilisateur, $idTo, $message);

        $this->executerAction("index");
    }

    //mettre à jour les notifications d'émetteur
    private function updateMessageNotifications() {
        echo 'pasa';
        $idTo = $this->requete->getParametre("id");
        $idUtilisateur = $this->requete->getSession()->getAttribut("idUtilisateur");

        $this->message->updateEmmiterNotificatios( $idTo, $idUtilisateur);

    }

}
