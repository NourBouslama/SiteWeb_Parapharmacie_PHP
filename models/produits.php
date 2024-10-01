<?php
include_once("connexion.php");
class produit extends Connexion{
 private $id,$label,$imageProd,$description,$nouvprix,$ancienprix,$etat,$quantite,$stock,$id_categ;
 function __construct(){
    parent::__construct();
     }

     function listeProduit(){
        $query="select * from produit";
        $res=$this->pdo->prepare($query);
        $res->execute();
        $result= $res->fetchAll();
        return $result;
           }
public function getProduit($id)
{  
    $req = "select * from produit where id=?";
    $result = $this->pdo->prepare($req);
    $result->execute(array($id));
    return $result->fetch();
}

function listeProduitsPromos(){
    $query="select * from produit where etat = 'en promos' LIMIT 3 ";
    $res=$this->pdo->prepare($query);
    $res->execute();
    $result= $res->fetchAll();
    return $result;
       }

function listeProduitsVisagesPromos(){
        $query="select * from produit where etat = 'en promos' AND id_categ = 1 LIMIT 3 ";
        $res=$this->pdo->prepare($query);
        $res->execute();
        $result= $res->fetchAll();
        return $result;
           }
function listeProduitsCheuveuxsPromos(){
            $query="select * from produit where etat = 'en promos' AND id_categ = 2 LIMIT 3 ";
            $res=$this->pdo->prepare($query);
            $res->execute();
            $result= $res->fetchAll();
            return $result;
               }

function listeProduitsVisages(){
            $query="select * from produit where  id_categ = 1  ";
            $res=$this->pdo->prepare($query);
            $res->execute();
            $result= $res->fetchAll();
            return $result;
               }
 function listeProduitsByCateg($id_categ){
            $query="select * from produit where  id_categ = ?  ";
            $result = $this->pdo->prepare($query);
            $result->execute(array($id_categ));
            return $result;
               }
 /*function ajoutPiece($designation,$taille,$quantité,$image){
 $query="insert into pieces(designation,taille,quantité,image)values (?, ?, ?, ?)";
 $res=$this->pdo->prepare($query);
return $res->execute(array($designation,$taille,$quantité,$image));
    }
function modifPiece($id,$designation,$taille,$quantité,$image){
        $query="update pieces set designation=?,taille=?,quantité=?,image=? where id=?";
        $res=$this->pdo->prepare($query);
       return $res->execute(array($designation,$taille,$quantité,$image));
           }
function supprime($id) {
        $query = "delete from pieces where id=?";
        $res=$this->pdo->prepare($query);
       return $res->execute(array($id));
        }*/

}
?>