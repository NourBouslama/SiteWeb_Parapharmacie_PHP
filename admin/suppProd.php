<?php
// Récupérer l'ID du produit à supprimer depuis le formulaire
$id_produit = $_GET['id'];

// Se connecter à la base de données MySQL
$nom_serveur = "localhost";
$utilisateur = "root";
$mot_de_passe ="";
$nom_base_données ="parapharmacie" ;
$con = mysqli_connect($nom_serveur , $utilisateur ,$mot_de_passe , $nom_base_données);



// Exécuter la requête SQL DELETE
$sql = "DELETE FROM produit WHERE id = '$id_produit'";

if (mysqli_query($con, $sql)) {
    header("Location:Produits.php") ;

} 

// Fermer la connexion à la base de données MySQL
mysqli_close($con);

?>