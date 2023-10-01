<?php

    class Directeur{

        private $matricule;
        private $nom;
        private $prenom;
        private $email;

        public function __construct($matricule, $nom, $prenom, $email){

            $this->matricule = $matricule;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->email = $email;

        }

        public function getNom() {
            return $this->nom;
        }
    
        public function getMatricule() {
            return $this->matricule;
        }

        public function getPrenom() {
            return $this->prenom;
        }

        public function getEmail() {
            return $this->email;
        }

        public function connecter(){
        }

        public function uploadFichier(){
        }

        public function validerNotes(){
        }
        
    }