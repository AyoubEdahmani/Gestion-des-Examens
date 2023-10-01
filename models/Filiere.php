<?php
    class Filiere
    {
    
        private $code;
        private $nom;

        public function __construct($code, $nom)
        {
            $this->code = $code;
            $this->nom = $nom;
        }

        public function getNom() {
            return $this->nom;
        }

        public function getCode() {
            return $this->code;
        }

        public function getModules()
        {
        }

        public function getGroupes()
        {
        }

        public function ajouter()
        {
        }

        public function supprimer()
        {
        }
        
    }