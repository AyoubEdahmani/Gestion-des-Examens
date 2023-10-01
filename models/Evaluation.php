<?php
 class Evaluation{
    private $id;
    private $idExamen;
    private $cinStagiaire;
    // public function __construct($id,$idExamen,$cinStagiaire)
    // {
    
    //     $this->id=$id;
    //     $this->idExamen=$idExamen;
    //     $this->cinStagiaire=$cinStagiaire;
    // }
        //getter and setter
        public  function getId()
        {
            return $this->id;
        }
        public   function setId($id)
        {
            $this->id = $id ;
        }
        public  function getIdExamen()
        {
            return $this->idExamen;
        }
        public   function setIdExamen($idExamen)
        {
            $this->idExamen = $idExamen ;
        }
        public  function getCinStagiaire()
        {
            return $this->cinStagiaire;
        }
        public   function setCinStagiaire($cinStagiaire)
        {
            $this->cinStagiaire = $cinStagiaire ;
        }
        public function pdo(){
            require("pdo.php");
            return $pdo;
        }
        public function getEvaluation($id){
            $sql="SELECT * FROM evaluation
             WHERE id=:id";
            $stmt=$this->pdo()->prepare($sql);
            $stmt->bindParam(":id",$id);
            $stmt->execute();
            $data=$stmt->fetchAll();

        }
        public function Ajouter($id,$idExamen,$cinStagiaire){
            $sql="INSERT INTO evaluation(id,idExamen,cinStagiaire) value(:id,:idExamen,:cinStagiaire)";
            $req=$this->pdo()->prepare($sql);
            $req->execute([
                "id"=>$id,
                "idExamen"=>$idExamen,
                "cinStagiaire"=>$cinStagiaire,
            ]);
        }
        public function Supprimer($id){
            $sql="DELETE from evaluation where id=:id";
            $req=$this->pdo()->prepare($sql);
            $req->execute([
                "id"=>$id,
            ]);
        }


 }
?>