<?php
include_once("connexion.php");
class panier extends Connexion{
 private $id_panier,$label,$imageprod,$prix;
 function __construct(){
    parent::__construct();
     }
function listePanier(){
      $query="select * from panier";
      $res=$this->pdo->prepare($query);
      $res->execute();
      $result= $res->fetchAll();
      return $result;
        }

function ajoutPanier($label,$imageprod,$prix){
       $query="insert into panier(label,imageprod,prix)values (?, ?, ?)";
       $res=$this->pdo->prepare($query);
       $res->execute(array($label,$imageprod,$prix));
        }
function supprimePanier($id_panier) {
        $query = "delete from panier where id_panier=?";
        $res=$this->pdo->prepare($query);
        return $res->execute(array($id));
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