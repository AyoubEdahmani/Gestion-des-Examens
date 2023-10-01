<?php
class Module
{

    private $code;
    private $nom;
    private $codeFiliere;
    private $matriculeFormateur;


    public function __construct($code, $nom, $codeFiliere, $matriculeFormateur)
    {
        $this->code = $code;
        $this->nom = $nom;
        $this->codeFiliere = $codeFiliere;
        $this->matriculeFormateur = $matriculeFormateur;
    }

    function getNom()
    {
        return $this->nom;
    }

    function getCode()
    {
        return $this->code;
    }

    public function getCodeFiliere()
    {
        return $this->codeFiliere;
    }

    public function getCompetence()
    {
    }
    
    public function getMatriculeFormateur()
    {
        return $this->matriculeFormateur;
    }

    public function getCompetences()
    {
    }

    public function getFiliere()
    {
    }

    public function getFormateur()
    {
    }

    public function ajouter()
    {
    }

    public function supprimer()
    {
    }
}