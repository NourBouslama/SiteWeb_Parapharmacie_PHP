<?php
include_once("models/categorie.php");
include_once("models/produits.php");
include_once("models/marque.php");
include_once("models/panier.php");

session_start() ;

/*$panier=new panier();
$paniers=$panier->listePanier();*/


$prod=new produit();
$produits=$prod->getProduit($_GET['id']);

$marq=new marque();
$marque=$marq->getMarque($produits['id_marque']);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ma Parapharmacie en Ligne</title>
  <link rel="stylesheet" href="DetailProduit1.css">
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
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
          <li><a href="Contact.php">Contact</a></li>
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
<h1 style="font-size: 50px ; color:rgb(46, 43, 43); text-align: center; text-decoration: underline; font-family:'Times New Roman', Times, serif"> Détail Produit</h1> <br>

  <body>
      <main>
        <br> <br>
        <div class="container4">
          <img src="<?= $produits['imageProd']?>" class="imgproduct"  alt="">
          <div class="container55">
           <br>
            <p class="desc"> <strong><?= $marque['nomMarq']?></strong> <br>
           <p class="label"><?= $produits['label']?> </p>
           <span style="font-size: 20px;" class="label"><?= $produits['quantite']?> ML</span> </p>
            
              <div class="prices">
                <span class="nouvPrice"><?= $produits['nouvprix']?> TND TTC</span>
                <span class="oldPrice"> <?= $produits['ancienprix']?> TND TTC </span>
              </div>
             
             
              
              <div class="quantity-input">
                <label for="quantity" class="qt">Quantité:</label>
                  <button class="quantity-btn" data-action="decrement" >-</button>
                  <input type="number" id="quantity" name="quantity" class="qte" value="1" min="1">
                  <button class="quantity-btn" data-action="increment" >+</button>
              </div>

              <span ><button onclick="window.location.href='panier2.php?id=<?=$produits['id']?>'" class="ajoutPanier"> <span class="ajout">Ajouter au panier</span><i class="fa fa-shopping-cart"></i></button></span>
            
              
            </div>

        </div>
  <br> <br>
      </main>
		<br>
<div class="descProduit">
  <button class="myButton" style="margin-right: 40px;"> <strong>Description</strong> </button>
  <button class="myButton2" style="margin-right: 40px;"> <strong>Détail produit</strong></button>
  <button class="myButton3"> <Strong>Avis</Strong> </button> 
  <br> <br>
  <div id="description" > 
         <?= $produits['description']?>
  </div>


    <div id="fiche" style="display: none;">
      <strong>Fiche technique:</strong> <br>
      <span style="margin-right: 150px;">Info produit</span> <?= $produits['etat']?> <br>
      <span style="margin-right: 100px;">Conditionnnement</span> flacon <br>
    </div>

    <div id="avis" style="display: none;">
      <i class="fa fa-envelope" style="padding-right: 30px;"></i>Commentaire (0)
    </div>
  </div > 
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
      
      
      <script>
 
     const myButton = document.querySelector(".myButton");
        const myButton3 = document.querySelector(".myButton3");
        const myButton2 = document.querySelector(".myButton2");
        const fiche = document.getElementById("fiche");
        const desc = document.getElementById("description");
        const avis = document.getElementById("avis");
      



      myButton.addEventListener("click", () => {
      myButton.style.color='rgb(5, 99, 5)'
      myButton2.style.color="black"
      myButton3.style.color="black"
      myButton.style.borderbottom= "1px solid green"
      fiche.style.display= "none"
      avis.style.display="none"
      desc.style.display = "block";
      });
      myButton2.addEventListener("click", () => {
      myButton2.style.color='rgb(5, 99, 5)'
      myButton.style.color="black"
      myButton3.style.color="black"
      fiche.style.display = "block";
      desc.style.display= "none"
      avis.style.display="none"

      });

      myButton3.addEventListener("click", () => {
      myButton3.style.color='rgb(5, 99, 5)'
      myButton.style.color="black"
      myButton2.style.color="black"
      desc.style.display= "none"
      fiche.style.display= "none"
      avis.style.display="block"
      });

      const decrementBtn = document.querySelector('[data-action="decrement"]');
const incrementBtn = document.querySelector('[data-action="increment"]');
const quantityInput = document.querySelector('#quantity');

decrementBtn.addEventListener('click', () => {
  let currentValue = parseInt(quantityInput.value);
  if (currentValue > 1) {
    quantityInput.value = currentValue - 1;
  }
});

incrementBtn.addEventListener('click', () => {
  let currentValue = parseInt(quantityInput.value);
  quantityInput.value = currentValue + 1;
});
/*
document.querySelector(".ajoutPanier").addEventListener("click", () {
    
    $panier=new panier();
    $paniers=$panier->ajoutPanier($produits['label'],$produits['imageProd'],$produits['nouvprix']);
?>
});*/
      </script>





			

		</section><!--/newsletter--><br>

    <div >
    
     
      <p class="droit">© 2023 Ma Parapharmacie en Ligne - Tous droits réservés</p>


    </div>

  </footer>
</body>
</html>