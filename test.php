<?php
session_start();
include "inc/finctions.php";

//connect
$connect = connect();

$visiteur = $_SESSION['id'];
$total=$_SESSION['panier'][1];
$date = date("Y-m-d");
//requetepanier
$requette_panier = "INSERT INTO panier(visiteur,total,date_creation) VALUES ('$visiteur', '$total' ,'$date')";
$resultat_panier = $connect->query($requette_panier);
$panier_id=$connect->lastInsertId();
$commandes=$_SESSION['panier'][3];
//add command

foreach($commandes as $commande)
{
//requete
$quantite=$commande[1];
$total=$commande[2];
$size=$commande[4];
$id_produit=$commande[0];
$prix = "INSERT INTO commande(produit,quantite,total,panier,date_modification,date_creation,size) VALUES ('$id_produit', '$quantite' ,'$total','$panier_id','$date','$date','$size')";
$resultat_prix = $connect->query($prix);
}

$name=$_POST['name'];
$street=$_POST['street'];
$city=$_POST['city'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$description=$_POST['description'];
//creation de la requete

$requete = "INSERT INTO livraison(panier,name,street,phone,email,description,city) VALUES ('$panier_id', '$name' ,'$street','$phone','$email','$description','$city')";

//execution de la requete

$resultatlivraison = $connect->query($requete);
if($resultatlivraison)
{
    echo "hello";
}
$_SESSION['panier']= null;
header('location:index.php');

?>