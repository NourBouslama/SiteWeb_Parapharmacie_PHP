<?php
include_once("connexion.php");
class user extends Connexion{
 private $idU,$nom,$prenom,$adresse,$mail,$mdp;
 function __construct(){
    parent::__construct();
     }



function getUser($mail){  
          $req = "select * from utilisateurs where mail=?";
          $result = $this->pdo->prepare($req);
          $result->execute(array($mail));
          return $result->fetch();
             }
function getUserId($id){  
                $req = "select * from utilisateurs where idU=?";
                $result = $this->pdo->prepare($req);
                $result->execute(array($id));
                return $result->fetch();
                   }
 function listUsers(){  
        $query="select * from utilisateurs WHERE role='client'"; 
        $res=$this->pdo->prepare($query);
        $res->execute();
        $result= $res->fetchAll();
        return $result;
                   }

 function listAdmin(){  
        $query="select * from utilisateurs WHERE role='admin'"; 
        $res=$this->pdo->prepare($query);
        $res->execute();
        $result= $res->fetchAll();
         return $result;
                                   }

function modifUser($nom,$prenom,$adresse,$mail,$mdp,$idU){
                $query="update utilisateurs set nom=?,prenom=?,adresse=?,mail=?,mdp=? where idU=?";
                $res=$this->pdo->prepare($query);
               return $res->execute(array($idU,$nom,$prenom,$adresse,$mail,$mdp));
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