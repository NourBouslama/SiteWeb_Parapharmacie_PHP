<?php
include_once("connexion.php");
class categorie extends Connexion{
 private $id_categorie,$nomCateg,$imageCateg;
 function __construct(){
    parent::__construct();
     }
function listeCateg(){
      $query="select * from categorie";
      $res=$this->pdo->prepare($query);
      $res->execute();
      $result= $res->fetchAll();
      return $result;
         }

function listeCategfav(){
          $query="select * from categorie where id_categorie IN (1, 2, 3, 4, 6)";
          $res=$this->pdo->prepare($query);
          $res->execute();
          $result= $res->fetchAll();
          return $result;
             }
function getCategorie($id_categorie){  
          $req = "select * from categorie where id_categorie=?";
          $result = $this->pdo->prepare($req);
          $result->execute(array($id_categorie));
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