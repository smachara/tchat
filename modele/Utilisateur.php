<?php

/**
 * Created by PhpStorm.
 * User: smach
 * Date: 10/12/2018
 * Time: 12:00 AM
 */
require_once 'outils/Modele.php';

class Utilisateur extends Modele
{

    public function chercherUtilisateur($surnom, $mdp) {
        $sql = 'select id, surnom from utilisateurs'
            . ' where surnom=? and mdp=?';
        $utilisateur = $this->executerRequete($sql, array($surnom, $mdp));
        if ($utilisateur->rowCount() > 0)
            return $utilisateur->fetch();  // Accès à la première ligne de résultat
        else
            return null; // throw new Exception("Aucun utilisateur ne correspond à l'identifiant '$surnom'");
    }



    public function chercherUtilisateurParSurnom($surnom) {
        $sql = 'select id, surnom from utilisateurs'
            . ' where surnom=?';
        $utilisateur = $this->executerRequete($sql, array($surnom));
        if ($utilisateur->rowCount() > 0)
            return $utilisateur->fetch();  // Accès à la première ligne de résultat
        else
            return null; // throw new Exception("Aucun utilisateur ne correspond à l'identifiant '$surnom'");
    }

    public function ajouterUtilisateur($surnom, $mdp) {
        $sql = 'insert into utilisateurs(surnom, mdp)'
            . ' values(?, ?)';
        return $this->executerRequete($sql, array( $surnom, $mdp));
    }
}