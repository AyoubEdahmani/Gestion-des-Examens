<?php
class Question{
    private $id;
    private $textQuestion;
    private $typeQuestion;
    private $option1;
    private $option2;
    private $option3;
    private $reponseCorrecte;
    private $idExamen;
    private $matriculeFormateur;
    public function __construct($id,$textQuestion,$typeQuestion,$option1,$option2,$option3,$reponseCorrecte,$idExamen,$matriculeFormateur)
    {
        $this->id=$id;
        $this->textQuestion=$textQuestion;
        $this->typeQuestion=$typeQuestion;
        $this->option1 = $option1 ;
        $this->option2=$option2;
        $this->$option3 =$option3;
        $this->reponseCorrecte=$reponseCorrecte;
        $this->idExamen=$idExamen;
        $this->matriculeFormateur=$matriculeFormateur;        
    }
    // getter and setter
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
         $this->id=$id;
    }
    public function getTextQuestion()
    {
        return $this->textQuestion;
    }
    public function setTextQuestion($textQuestion)
    {
         $this->textQuestion=$textQuestion;
    }
    public function getTypeQuestion()
    {
        return $this->typeQuestion;
    }
    public function setTypeQuestion($typeQuestion)
    {
         $this->typeQuestion=$typeQuestion;
    }
    public function getOption1()
    {
        return $this->option1;
    }
    public function setOption1($option1)
    {
         $this->option1=$option1;
    }
    public function getOption2()
    {
        return $this->option2;
    }
    public function setOption2($option2)
    {
         $this->option2=$option2;
    }
    public function getOption3()
    {
        return $this->option3;
    }
    public function setOption3($option3)
    {
         $this->option3=$option3;
    }
    public function getReponseCorrecte()
    {
        return $this->reponseCorrecte;
    }
    public function setReponseCorrecte($reponseCorrecte)
    {
         $this->reponseCorrecte=$reponseCorrecte;
    }
    public function getIdExamen()
    {
        return $this->idExamen;
    }
    public function setIdExamen($idExamen)
    {
         $this->idExamen=$idExamen;
    }
    public function getMatriculeFormateur()
    {
        return $this->matriculeFormateur;
    }
    public function setMatriculeFormateur($matriculeFormateur)
    {
         $this->matriculeFormateur=$matriculeFormateur;
    }
    public function pdo(){
        require("pdo.php");
        return $pdo;
    }

  public function ajouterQuestion($id,$textQuestion,$typeQuestion,$option1,$option2,$option3,$reponseCorrecte,$idExamen,$matriculeFormateur){
    $sql="INSERT into question(id,textQuestion,typeQuestion,option1,option2,option3,reponseCorrecte,idExamen,matriculeFormateur)
     value(:id,:textQuestion,:typeQuestion,:option1,:option2,:option3,:reponseCorrecte,idExamen,:matriculeFormateur)";
    $req=$this->pdo()->prepare($sql);
    $req->execute([
        ":id"=>$id,
        ":textQuestion"=>$textQuestion,
        ":typeQuestion"=>$typeQuestion,
    ":option1"=>$option1,
    ":option2"=>$option2,
    ":option3"=>$option3,
    ":reponseCorrecte"=>$reponseCorrecte,
    ":idExamen"=>$idExamen,
    ":matriculeFormateur"=>$matriculeFormateur,
    ]);
    

  }
  public function modifieQuestion($id,$matriculeFormateur,$idExamen,$newQuestuon){
    $sql="UPDATE question set textQuestion=:textQuestion 
    where id= :id and matriculeFormateur =:matriculeFormateur  AND idExamen=:idExamen";
    $req=$this->pdo()->prepare($sql);
    $valid=$req->execute([
        ":id"=>$id,
        ":textQuestion" => $newQuestuon,
        ":matriculeFormateur"=>$matriculeFormateur,
        ":idExamen"=>$idExamen
    ]);
    if($valid){
        // return "valid"
    }
  }
  public function editQuestion($id,$matriculeFormateur,$idExamen,$new){
    $sql="UPDATE question 
    set 
    option1=:option1 ,
    option2=:option2 ,
    option3=:option3,
    reponseCorrecte=:reponseCorrecte
    where id= :id and matriculeFormateur =:matriculeFormateur  AND idExamen=:idExamen";
    $req=$this->pdo()->prepare($sql);
    $valid=$req->execute([
        ":id"=>$id,
        ":option1" => $new["option1"],
        ":option2"=> $new['option2'],
        ":option3"=>$new['option3'] ,
        ":reponseCorrecte"=>$new['reponseCorrecte'],
        ":matriculeFormateur"=>$matriculeFormateur,
        ":idExamen"=>$idExamen
    ]);
    if($valid){
        // return "valid"
    }
  }
  public function supprimerQuestion($id,$matriculeFormateur,$idExamen){
    $sql="DELETE from question 
    where id= :id and matriculeFormateur =:matriculeFormateur  AND idExamen=:idExamen";
    $req=$this->pdo()->prepare($sql);
    $req->execute([
        "id"=>$id,
        'matriculeFormateur'=>$matriculeFormateur,
        "idExamen"=>$idExamen]);
    
  }
}
?>
