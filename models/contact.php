<?php
include_once("connexion.php");
class contact extends Connexion{
 private $idC;
 function __construct(){
    parent::__construct();
     }
function listeContact(){
      $query="select * from contact";
      $res=$this->pdo->prepare($query);
      $res->execute();
      $result= $res->fetchAll();
      return $result;
         }

public function getContact($idC)
         {  
               $req = "select * from contact where idC=?";
               $result = $this->pdo->prepare($req);
               $result->execute(array($idC));
               return $result->fetch();
         }

      }
?>