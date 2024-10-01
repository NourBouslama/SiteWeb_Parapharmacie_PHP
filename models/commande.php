<?php
include_once("connexion.php");
class commande extends Connexion{
 private $idCmd,$label,$image,$prix,$quantite;
 function __construct(){
    parent::__construct();
     }
function listecommande(){
      $query="select * from commande";
      $res=$this->pdo->prepare($query);
      $res->execute();
      $result= $res->fetchAll();
      return $result;
        }
 function listeNewCommandes(){
        $query="select * from commande LIMIT 4 ";
        $res=$this->pdo->prepare($query);
        $res->execute();
        $result= $res->fetchAll();
        return $result;
                   }
function ajoutcommande($label,$image,$prix,$quantite){
       $query="insert into commande(label,image,prix,quantite)values (?, ?, ?, ?)";
       $res=$this->pdo->prepare($query);
       $res->execute(array($label,$image,$prix,$quantite));
        }
function supprimecommande($idCmd) {
        $query = "delete from commande where idCmd=?";
        $res=$this->pdo->prepare($query);
        return $res->execute(array($idCmd));
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