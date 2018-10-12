<?php

/*
 * Classe modélisant une requête HTTP entrante
 */
class Requete {

    /** Tableau des paramètres de la requête */
    private $parametres;

    /**
     * Constructeur
     * 
     */
    public function __construct($parametres) {
        $this->parametres = $parametres;
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
            throw new Exception("Paramètre '$nom' absent de la requête");
        }
    }

}

