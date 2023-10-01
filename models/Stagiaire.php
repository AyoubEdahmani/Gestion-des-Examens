<?php

    class Stagiaire{
        private $cin;
        private $nom;
        private $prenom;
        private $email;
        private $codeGroupe;
        // public function __construct($cin,$nom,$prenom,$email,$codeGroupe)
        // {
        //     $this->cin=$cin;
        //     $this->nom=$nom;
        //     $this->prenom=$prenom;
        //     $this->email=$email;
        //     $this->codeGroupe=$codeGroupe;      
        // }
        //getter and setter
        public function getCin()
        {
        return $this->cin ;
        }
        public function getNom(){
         return $this->nom
        ;}

        public function getPrenom()
        {
            return $this->prenom
        ;}
        public function getEmail(){
            return  $this->email
        ;}
        
        public function getCodegroupe()
        {
           return $this->codeGroupe 
        ;}
        public  function setCin( $cin){
            $this->cin=$cin;
        }
        public function setNom($nom)
        {
            $this->nom=$nom
        ;}
        public function setPrenom($prenom){
            $this->prenom=$prenom
            ;}
        
        public function setEmail($email)
        {
            $this->email=$email
        ;}

        public function pdo(){
            require("pdo.php");
            return $pdo;
        }
            
            
                    

        public function connecter($email,$pass){
            $pdo=$this->pdo();
            $req=$pdo->prepare("SELECT * FROM stagiaire where email=:email");
            $req->bindValue(':email',$email);
            $req->execute();
            $data=$req->fetchAll();
            if($req->rowCount()>0){
                if($data["password"]==$pass){
                     //password valid

                }
                else{
                    "mot de passe incorrect";
                }
            }
            else{
                // email not existe
            }
        }
            public function visualiserDatesExamen($codeGroupe){
                $pdo=$this->pdo();
                $req=$pdo->prepare("SELECT * FROM examen where codeGroupe=:codeGroupe");   
                $req->bindvalue(":codeGroupe",$codeGroupe);
                $req->execute();
                $data=$req->fetchAll();
                return $data;
                
            
            
            }
        public function repondreExamen(){
            // repondreExamen
        }
        public function consulterCorrectionExamen(){
            // consulterCorrectionExamen
        }
        public function Ajouter($cin,$nom,$prenom,$email,$codeGroupe){
            $sql="INSERT INTO stagiaire(cin,nom,prenom,email,codeGroupe) value(:cin,:nom,:prenom,:email,:codeGroupe)";
            $req=$this->pdo()->prepare($sql);
            $req->execute([
                "cin"=>$cin,
                "nom"=>$nom,
                "prenom"=>$prenom,
                "email"=>$email,
                "codeGroupe"=>$codeGroupe
            ]);
            }


            
        
        public function Supprimer($cin){
            $sql="DELETE from stagiaire where cin=:cin";
            $req=$this->pdo()->prepare($sql);
            $req->execute([
                "cin"=>$cin,
            ]);
         }
        
            }
    
?>