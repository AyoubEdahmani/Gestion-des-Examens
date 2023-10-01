<?php

    class Competence{

        private $id;
        private $nom;
        private $codeModule;

        public function __construct($id, $nom, $codeModule){
            $this->id = $id;
            $this->nom = $nom;
            $this->codeModule = $codeModule;
        }

        public function getId() {
            return $this->id;
        }

        public function getNom() {
            return $this->nom;
        }

        public function getCodeModule() {
            return $this->codeModule;
        }

        public function getExamen(){
        }

        public function ajouterCompetence(){
        }


        public function supprimerCompetence(){
        }


        public function getModule(){
        }

}
