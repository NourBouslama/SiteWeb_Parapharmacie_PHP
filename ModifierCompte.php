<?php 
include_once("models/user.php");
session_start() ;

if(!isset($_SESSION['email'])){
  header("Location:conn.php") ;
  exit;
}
 //Nous allons démarrer la session avant toute chose

       
       $email=$_SESSION['email'] ;

       $cat=new user();
$resultat=$cat->getUser($email);

if(!empty($_POST)){
  extract($_POST);
  if(isset($_POST["modifier"])){
    $nom= (String) trim($nom);
    $prenom= (String) trim($prenom);
    $adresse= (String) trim($adresse);
    $mail= (String) trim($mail);
    $mdp= (String) trim($mdp);
   // $mdp= crypt($mdp, '$2y$10$abcdefghijkmnopqrstuvwxyz012345');

   
    $con = new PDO("mysql:host=localhost;dbname=parapharmacie;charset=utf8","root","");

$req = $con->prepare('UPDATE utilisateurs SET nom = ?,prenom = ?,adresse = ?,mail = ?,mdp = ? WHERE idU = ?');
$req->execute(array($nom,$prenom,$adresse,$mail,$mdp,$resultat['idU']));
header("Location:conn.php") ;
  exit;

}

}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ma Parapharmacie en Ligne</title>
  <link rel="stylesheet" href="ModifierCompte.css">
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <!--
  <script src="script1.js" async></script>

  -->

</head>

  <header>
    <nav class="navbar">
      <div class="search-box">
        <input type="text" placeholder="Rechercher">
        <button type="submit" class="fa fa-search"></button>
      </div>
     
      <div class="site-name">
        <a href="#"><img src="images/logopara.png" height="350px" alt="Logo"></a>
      </div>
      <div class="container1">
        <div class="heart">
          <label for=""></label>
          <a href="conn.php"><i style="font-size:34px; " class="bx bxs-log-out-circle"></i></a>
        </div>
        <div class="cart">
          <label for=""></label>
          <a href="panier.php"><i class="fa fa-shopping-cart"></i></a>
        </div>
        <div class="user">
          <label for=""></label>
          <a href="#"><i class="fa fa-user"></i></a>
        </div>
      </div>     
    </nav>
  
    <hr class="hr22">
    <div class="container2">
      <nav >
        <ul>
          <li><a href="acceuil.php">Accueil</a></li>

          <li><a href="Apropos.html">A Propos</a></li>
          <li><a href="Contact.php">Contact</a></li>
        </ul>
      </nav>
    </div>
    <div class="container2categ">
      <nav >
        <ul>
          <!-- <li ><a href="#"  >Marques <i class="fa fa-caret-down" aria-hidden="true" ></i></a></li>--> 
          <li><a href="Visage.php?id_categ=1">Visages  <i aria-hidden="true" ></i></a></li>
           <li><a href="Visage.php?id_categ=2">Cheveux  <i aria-hidden="true" ></i></a></li>
           <li><a href="Visage.php?id_categ=3">Solaire  <i aria-hidden="true" ></i></a></li>
           <li><a href="Visage.php?id_categ=4">Bebe maman  <i aria-hidden="true" ></i></a></li>
           <li><a href="Visage.php?id_categ=5">Compliment alimentaire  <i  aria-hidden="true" ></i></a></li>
           <li><a href="Visage.php?id_categ=6">Materiel medical  <i  aria-hidden="true" ></i></a></li>
         </ul>
      </nav>
    </div>
   <br>
   
  </header>

<br><br><br><br><br><br> <br>
<h1 style="font-size: 50px ; color:rgb(46, 43, 43); text-align: center; text-decoration: underline; font-family:'Times New Roman', Times, serif"> Modifier Compte</h1> <br>

  <body>
    <div></div>
    <main>
		<section>
      <form id="form" name="form" method="post" class="form">
      <input type="hidden" name="idU" value="<?=$resultat['idU']?>">

      <div class="form-control ">
				  <label for="prenom">Prénom :</label>
          <?php
          if(!isset($prenom)){
            $prenom=$resultat['prenom'];
          }
          ?>
				  <input type="text" id="prenom" name="prenom" value="<?=$prenom?>">
          <i class="fas fa-check-circle"></i>
          <i class="fas fa-exclamation"></i> <br>
          <small>Message d'erreur</small> 
      </div>
<br>
      <div class="form-control ">
            <label for="nom">Nom :</label>
            <?php
               if(!isset($nom)){
                $nom=$resultat['nom'];
              }
          ?>
				    <input type="text" id="nom"  name="nom" value="<?=$nom?>">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation"></i> <br>
            <small>Message d'erreur</small>
        </div>
        <br>
        <div class="form-control ">
            <label for="adresse">Adresse  :</label>
            <?php
            if(!isset($adresse)){
              $adresse=$resultat['adresse'];
            }
          ?>
            <input type="text" id="adresse" name="adresse" value="<?=$adresse?>">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation"></i> <br>
            <small>Message d'erreur</small>
        </div>
		<br>
        <div class="form-control ">
            <label for="email">Adresse mail :</label>
            <?php
              if(!isset($mail)){
                $mail=$resultat['mail'];
              }
          ?>
            <input type="text" id="email" name="mail"  value="<?=$mail?>">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation"></i> <br>
            <small>Message d'erreur</small>
        </div>
		<br>

        <div class="form-control ">
				    <label for="mdp1">Validation mot de passe :</label>
            <?php
            if(!isset($mdp)){
              $mdp=$resultat['mdp'];
            }
          ?>
				    <input type="password" id="mdp1" name="mdp" value="<?=$mdp?>" >
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation"></i> <br>
            <small>Message d'erreur</small>
        <div>
 <br>
        <div class="form-control ">
            <label for="mdp2">Confirmer le nouveau mot de passe :</label>
			    	<input type="password" id="mdp2" value="<?=$resultat['mdp']?>" > 
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation"></i><br>
           <small>Message d'erreur</small>
        </div>
        <br>
        <br>
				<input type="submit" value="Enregistrer les modifications" class="envoyer" name="modifier">
			</form><br>
      <p style="color: red;" id="erreur"></p> <br>
           


 </div>
 <div> 
    
    
 <br> <br><br><br>

 <br>

 </div>

           
		</section>

	
	</main>
   

    <br><br><br>
  
  <footer>
    
<br><br>
<hr class="foot">
    <section   class="newsletter">
      <div>
        <img src="images/logopara (2).png" height="350px" alt="Logo">
      
        <p>Pharma-shop.tn est N°1 parapharmacie <br>en ligne en Tunisie.
           Vous trouverez chez <br> tous vos produits 
           parapharmaceutique <br>(santé, beauté, minceur...)</p>
      </div>

      <div>
        <br>
        <h1>Informations</h1>
        <br>
        <ul>
          <li><a href="#">Promotions</a></li><!--/li-->
          <li><a href="#">Nouveaux produits</a></li><!--/li-->
          <li><a href="#">Meilleures ventes</a></li><!--/li-->
          <li><a href="Contact.html">Contactez-nous</a></li><!--/li-->
          <li><a href="Apropos.html">A propos</a></li><!--/li-->
        </ul>
      </div>


      <div>
        <br>
        <h1>Mon Compte</h1>
        <br>
        <ul>
          <li><a href="#">Mes commandes</a></li><!--/li-->
          <li><a href="#">Mes avoires</a></li><!--/li-->
          <li><a href="#">Mes adresses</a></li><!--/li-->
          <li><a href="#">Mes informations personnels</a></li><!--/li-->
          <li><a href="#">Mes bon de réduction</a></li><!--/li-->
        </ul>
      </div>

      <div>
        <br>
          <h1>Service Client</h1>
          <br>
          <p>
            <b>Tél</b><br>
            <span class="tel">
              +216 70 608 000

            </span>
          </p>
          <p>
            <b>Email</b> <br>
            <span class="tel">
              contact@pharma-shop.tn

            </span>
          </p>
      </div>
      
      
     





			

		</section><!--/newsletter--><br>

    <div >
    
     
      <p class="droit">© 2023 Ma Parapharmacie en Ligne - Tous droits réservés</p>


    </div>

  </footer>
</body>
</html>