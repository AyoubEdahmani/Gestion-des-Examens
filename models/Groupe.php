<?php
class Groupe
{
    private $code;
    private $nom;
    private $codeFiliere; 

    public function __construct($code, $nom, $codeFiliere)
    {
        $this->code = $code;
        $this->nom = $nom;
        $this->codeFiliere = $codeFiliere;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getCode() {
        return $this->code;
    }

    public function getCodeFiliere()
    {
        return $this->codeFiliere;
    }

    public function getFiliere()
    {
    }

    public function getStagiaires()
    {
    }

    public function ajouter()
    {
    }

    public function supprimer()
    {
    }
}