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
  if(isset($_POST["envoyer"])){
    $prenom= (String) trim($prenom);
    $message= (String) trim($message);
    $mail= (String) trim($mail);
   // $mdp= crypt($mdp, '$2y$10$abcdefghijkmnopqrstuvwxyz012345');

   
    $con = new PDO("mysql:host=localhost;dbname=parapharmacie;charset=utf8","root","");

$req = $con->prepare('insert into contact (prenom,mail,message)values (?, ?, ?)');
$req->execute(array($prenom,$mail,$message));
header("Location:Contact.php") ;
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
  <link rel="stylesheet" href="Contact.css">
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
  <script src="script2.js" ></script>

  
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
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
          <a href="ModifierCompte.php"><i class="fa fa-user"></i></a>
        </div>
      </div>     
    </nav>
  
    <hr class="hr22">
    <div class="container2">
      <nav >
        <ul>
          <li><a href="acceuil.php">Accueil</a></li>

          <li><a href="Apropos.html">A Propos</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </nav>
    </div>
    <div class="container2categ">
      <nav >
        <ul>
          <!-- <li ><a href="#"  >Marques <i class="fa fa-caret-down" aria-hidden="true" ></i></a></li>--> 
          <li><a href="Visage.php?id_categ=1">Visages  <i  aria-hidden="true" ></i></a></li>
           <li><a href="Visage.php?id_categ=2">Cheveux  <i  aria-hidden="true" ></i></a></li>
           <li><a href="Visage.php?id_categ=3">Solaire  <i  aria-hidden="true" ></i></a></li>
           <li><a href="Visage.php?id_categ=4">Bebe maman  <i aria-hidden="true" ></i></a></li>
           <li><a href="Visage.php?id_categ=5">Compliment alimentaire  <i  aria-hidden="true" ></i></a></li>
           <li><a href="Visage.php?id_categ=6">Materiel medical  <i  aria-hidden="true" ></i></a></li>
         </ul>
      </nav>
    </div>
   <br>
   
  </header>

<br><br><br><br><br><br> <br>
<h1 style="font-size: 50px ; color:rgb(46, 43, 43); text-align: center; text-decoration: underline; font-family:'Times New Roman', Times, serif"> Contact</h1> <br>

  <body>
    <div></div>
    <main>
		<section>
			<h1 style="text-decoration: underline ;">Service Client</h1>
			<form  id="form" name="form" method="post" class="form">

        <div class="form-control ">
          <label for="nom">Prenom :</label>
          <?php
          if(!isset($prenom)){
            $prenom=$resultat['prenom'];
          }
          ?>
          <input type="text" id="nom" name="prenom" value="<?=$prenom?>" >
          <i class="fas fa-check-circle"></i>
          <i class="fas fa-exclamation"></i> <br>
          <small>Message d'erreur</small> 
        </div> <br>
			
        <div class="form-control ">
          <label for="email">E-mail :</label>
          <?php
              if(!isset($mail)){
                $mail=$resultat['mail'];
              }
          ?>
          <input type="text" id="email" name="mail" value="<?=$mail?>" >
          <i class="fas fa-check-circle"></i>
          <i class="fas fa-exclamation"></i> <br>
          <small>Message d'erreur</small> 
          </div> <br>
			

          <div class="form-control ">
            <label for="email"> Validation d'e-mail :</label>
            <input type="text" id="email2" name="email2" placeholder="Taper votre email" >
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation"></i> <br>
            <small>Message d'erreur</small> 
            </div> <br>


        <div class="form-control ">
          <label for="message">Message :</label>
       
          <textarea id="message" name="message" value="<?= $message?>"></textarea>
          <i class="fas fa-check-circle"></i>
          <i class="fas fa-exclamation"></i> <br>
          <small>Message d'erreur</small> 
          </div> <br>


				<input type="submit" value="Envoyer" class="envoyer" name="envoyer">
			</form><br>
      <p style="color: red;" id="erreur"></p> <br>
            <h1 style="text-decoration: underline ;">Informations de contact</h1> <br>
            <b style="padding-right: 400px; padding-left: 40px;" >Adresse</b> <b>Téléphone</b> <br> <br>
    <span style="padding-right: 300px;">Akouda, Sousse 4022</span>
    <span>Fixe:

        (+216) 70 024 840</span>
<br><br><br>
    <b style="padding-right: 400px; padding-left: 40px; ">E-Mail</b> <b>Horaires</b> <br> 
    <br>
    <span style="padding-right: 320px;">contact@tunisiepara.com</span>

Ouvert 24h/24
 </div>
 <div> 
    
    
 <br> <br><br><br>

 <br>

 </div>

           
		</section>

		<aside>
			
			
                <img src="images/adressepara.PNG"  alt="">
				
		</aside>
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