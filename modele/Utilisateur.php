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

    public function getUsersWithoutSender($id_user_emetteur) {

        $sql = 'SELECT u.*, COUNT(m.lu) as notification'
            . ' FROM  utilisateurs u '
            . ' LEFT JOIN messages m'
            . ' ON u.id = m.id_user_emetteur'
            . ' WHERE u.id <> ? and  m.lu = false'
            . ' GROUP BY u.id HAVING COUNT(m.lu) > 0'
            . ' UNION'
            . ' SELECT u.*, COUNT(m.lu) as notification'
            . ' FROM  utilisateurs u '
            . ' LEFT JOIN messages m'
            . ' ON u.id = m.id_user_emetteur'
            . ' WHERE u.id <> ? '
            . ' GROUP BY u.id HAVING COUNT(m.lu) = 0';

        $users = $this->executerRequete($sql, array($id_user_emetteur, $id_user_emetteur));
        return $users;
    }



    public function chercherUtilisateur($surnom, $mdp) {
        $sql = 'select id as idUtilisateur, surnom from utilisateurs'
            . ' where surnom=? and mdp=?';
        $utilisateur = $this->executerRequete($sql, array($surnom, $mdp));
        if ($utilisateur->rowCount() > 0)
            return $utilisateur->fetch();  // Accès à la première ligne de résultat
        else
            return null; // throw new Exception("Aucun utilisateur ne correspond à l'identifiant '$surnom'");
    }

    public function chercherUtilisateurParID($id) {
        $sql = 'select id, surnom from utilisateurs'
            . ' where id=? ';
        $utilisateur = $this->executerRequete($sql, array($id));
        if ($utilisateur->rowCount() > 0)
            return $utilisateur->fetch();  // Accès à la première ligne de résultat
        else
            return null; // throw new Exception("Aucun utilisateur ne correspond à l'identifiant '$surnom'");
    }


    public function chercherUtilisateurParSurnom($surnom) {
        $sql = 'select id as idUtilisateur, surnom from utilisateurs'
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