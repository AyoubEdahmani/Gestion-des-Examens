<?php
class Examen{
    private $id;
    private $titre;
    private $dateExamen;
    private $matriculeFormateur;
    private $idCompetence;
    private $state;
    // public function __construct($id,$titre,$dateExamen,$matriculeFormateur,$idCompetence)
    // {
    //     $this->id=$id;
    //     $this->titre=$titre;
    //     $this->dateExamen=$dateExamen;
    //     $this->matriculeFormateur=$matriculeFormateur;
    //     $this->idCompetence=$idCompetence;
    //     $this->state=$state;
    // }
    //getter and setter
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
         $this->id=$id;
    }
    
    public function geTitre()
    {
        return $this->titre;
    }
    public function setTitre($titre)
    {
         $this->titre=$titre;
    }
    
    public function geDateExamen()
    {
        return $this->dateExamen;
    }
    public function setDateExamen($dateExamen)
    {
         $this->dateExamen=$dateExamen;
    }
    public function getMatriculeFormateur()
    {
        return $this->matriculeFormateur;
    }
    public function setMatriculeFormateur($matriculeFormateur)
    {
         $this->matriculeFormateur=$matriculeFormateur;
    }
    public function getIdCompetence()
    {
        return $this->idCompetence;
    }
    public function setIdCompetence($idCompetence)
    {
         $this->idCompetence=$idCompetence;
    }
    public function getState()
    {
        return $this->state;
    }
    public function setState($state)
    {
         $this->state=$state;
    }
    public function pdo(){
        require("pdo.php");
        return $pdo;
    }
    public function getQuestions($formateur,$filiere,$module,$competence){
        $sql="SELECT * FROM question Q 
        inner join formateur F
        on F.matricule= Q.matriculeFormateur
        inner join examen E 
        on Q.idEexam= E.id 
        inner join competence C 
        on C.id=E.idCompetence 
        inner join Module M 
        on M.code=C.codeModule 
        inner join filiere Fi 
        on Fi.code=M.codeFiliere;
        where M.nom=:nomModule and C.nom=:nomCompetence and Fi.nom=:nomFiliere and F.matricule=:matricule "
        ;
        $req = $this->pdo()->prepare( $sql); 
        $req->execute([
            "nomModule"=>$module,
            'nomCompetence'=>$competence,
            "nomFiliere"=> $filiere,
            "matricule"=>$formateur]);
        return $data=$req->fetchAll();


    }
    public function addQuestion($idQ,$matriculeFormateur){
        $sql="UPDATE question set idExamen=:idExamen 
        where id= :id and matriculeFormateur =:matriculeFormateur";
        $req=$this->pdo()->prepare($sql);
        $valid=$req->execute([
            ":id"=>$idQ,
            ":matriculeFormateur"=>$matriculeFormateur,
            
        ]);
        if($valid){
            // return "valid"
        }


    }
    public function removeQuestion($idQ,$matriculeFormateur){
        $sql="DELETE from question   
        where id= :id and matriculeFormateur =:matriculeFormateur";
        $req=$this->pdo()->prepare($sql);
        $valid=$req->execute([
            ":id"=>$idQ,
            ":matriculeFormateur"=>$matriculeFormateur,
            
        ]);
        if($valid){
            // return "valid"
        }
    }
    public function ouvrirEtFermerExam($state,$id,$matriculeFormateur){
        $sql="UPDATE examen set state=:verrou 
        where id= :id and matriculeFormateur =:matriculeFormateur";
        $req=$this->pdo()->prepare($sql);
        $valid=$req->execute([
            ":verrou"=>$state,
            ":id"=>$id,
            ":matriculeFormateur"=>$matriculeFormateur
        ]);
    }
    
    public function Ajouter($id,$titre,$dateExamen,$matriculeFormateur,$idCompetence,$state){
        $sql="INSERT INTO stagiaire(id,titre,dateExamen,matriculeFormateur,idCompetence,state))
        value(:id,:titre,:dateExamen,:matriculeFormateur,:idCompetence,:state)";
        $req=$this->pdo()->prepare($sql);
        $req->execute([
            "id"=>$id,
            "titre"=>$titre,
            "dateExamen"=>$dateExamen,
            "matriculeFormateur"=>$matriculeFormateur,
            "idCompetence"=>$idCompetence,
            "state"=>$state
        ]);
    }
    public function Supprimer($id,$matriculeFormateur){
        $sql="DELETE from examen  
        where id= :id and matriculeFormateur =:matriculeFormateur";
        $req=$this->pdo()->prepare($sql);
        $req->execute([
            "id"=>$id,
            ":matriculeFormateur"=>$matriculeFormateur,
        ]);
    }
    }

    




?>