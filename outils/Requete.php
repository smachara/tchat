<?php

require_once 'Session.php';
/*
 * Classe modélisant une requête HTTP entrante
 */
class Requete {

    /** Tableau des paramètres de la requête */
    private $parametres;
    private $session;

    /**
     * Constructeur
     * 
     */
    public function __construct($parametres) {
        $this->parametres = $parametres;
        $this->session = new Session();
    }

    /**
     * Renvoie l'objet session associé à la requête
     *
     * @return Session Objet session
     */
    public function getSession() {
        return $this->session;
    }

    /**
     * Renvoie vrai si le paramètre existe dans la requête
     * 
     */
    public function existeParametre($nom) {
        return (isset($this->parametres[$nom]) && $this->parametres[$nom] != "");
    }

    /**
     * Renvoie la valeur du paramètre demandé
     * 
     */
    public function getParametre($nom) {
        if ($this->existeParametre($nom)) {
            return $this->parametres[$nom];
        }
        else {
            return null;//throw new Exception("Paramètre '$nom' absent de la requête");
        }
    }

}

