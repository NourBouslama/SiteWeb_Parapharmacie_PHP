<?php
include_once("connexion.php");
class marque extends Connexion{
 private $idMarq,$nomMarq;
 function __construct(){
    parent::__construct();
     }
function listeMarque(){
      $query="select * from marque";
      $res=$this->pdo->prepare($query);
      $res->execute();
      $result= $res->fetchAll();
      return $result;
         }

public function getMarque($idMarq)
         {  
               $req = "select * from marque where idMarq=?";
               $result = $this->pdo->prepare($req);
               $result->execute(array($idMarq));
               return $result->fetch();
         }




  /*
 function ajoutCategorie($nomCateg,$imageCateg){
 $query="insert into categorie(nomCateg,imageCateg)values (?, ?)";
 $res=$this->pdo->prepare($query);
return $res->execute(array($nomCateg,$imageCateg));
    }
function modifCategorie($id,$nomCateg,$imageCateg){
        $query="update categorie set nomCateg=?,imageCateg=? where id=?";
        $res=$this->pdo->prepare($query);
       return $res->execute(array($nomCateg,$imageCateg));
           }
function supprimeCategorie($id) {
        $query = "delete from categorie where id=?";
        $res=$this->pdo->prepare($query);
       return $res->execute(array($id));
        }
public function getCategorie($id)
        {  
              $req = "select * from categorie where id=?";
              $result = $this->pdo->prepare($req);
              $result->execute(array($id));
              return $result;
        }
*/
      }
?>