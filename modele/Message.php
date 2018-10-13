<?php

/**
 * Created by PhpStorm.
 * User: smach
 * Date: 10/12/2018
 * Time: 1:30 AMby
 */
require_once 'outils/Modele.php';

class Message extends Modele
{

    public function getMessagesByUser($id_user_emetteur, $id_user_recepteur) {
        $sql = 'SELECT id,id_user_emetteur,id_user_recepteur,message,cree_a FROM messages '
            . ' WHERE (`id_user_emetteur` = ? or `id_user_emetteur` = ?)AND (`id_user_recepteur` = ? or `id_user_recepteur` = ? ) '
            . 'ORDER BY cree_a';

        $messages = $this->executerRequete($sql, array($id_user_emetteur, $id_user_recepteur, $id_user_recepteur, $id_user_emetteur));
        return $messages;
    }


    public function ajouterMessage($id_user_emetteur, $id_user_recepteur, $message) {
        $sql = 'insert into messages(`id_user_emetteur`, `id_user_recepteur`, `message`)'
        . ' values(?, ?, ?)';

        $this->executerRequete($sql, array($id_user_emetteur, $id_user_recepteur, $message));
    }
}