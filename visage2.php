<?php
include_once("models/categorie.php");
include_once("models/produits.php");
include_once("models/marque.php");

$cat=new categorie();
$categs=$cat->listeCategfav();

$prod=new produit();
$produits=$prod->listeProduitsVisages();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ma Parapharmacie en Ligne</title>
  <link rel="stylesheet" href="visage2.css">
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
          <li><a href="Visage.php">Visages  <i  aria-hidden="true" ></i></a></li>
           <li><a href="cheveux.php">Cheveux  <i  aria-hidden="true" ></i></a></li>
           <li><a href="solaire.php">Solaire  <i  aria-hidden="true" ></i></a></li>
           <li><a href="BebeMaman.php">Bebe maman  <i aria-hidden="true" ></i></a></li>
           <li><a href="ComplementAlimentaire.php">Compliment alimentaire  <i  aria-hidden="true" ></i></a></li>
           <li><a href="MaterielMedical.php">Materiel medical  <i  aria-hidden="true" ></i></a></li>
         </ul>
      </nav>
    </div>
   <br>
   
  </header>

<br><br><br><br><br><br><br> <br>

<body>

  <div class="container3">
  <p class="nouv"> Produits du visage</p> <br>
        <img src="images/slidervisage.PNG" alt=""> <br> <br>
        <p class="descVisage">Découvrez les meilleurs produits de Parapharmacie pour votre visage sur notre boutique en ligne pharma-shop.tn : Crème Hydratante, 
          Anti-âge, Masque Visage, Correcteur... <br> avons sélectionné pour vous un large choix d'articles de soins pour
           les différents types de peaux (peau sensible, peau atopique , peau grasse, peau sèche...). <br>
            Retrouvez les plus grandes marques de soins de la peau comme Nuxe, vichy, Bioderma ou SVR...</p>
            <br>

      

      <br>
      <div class="container4">
         
      <?php foreach($produits as $row):
                 $marq=new marque();
                 $marque=$marq->getMarque($row['id_marque']);
                ?>
        <div class="product">
        <img src="<?= $row['imageProd']?>" class="imgproduct"  alt=""  onclick="window.location.href='DetailProduit.html'">
                <p> <b><?= $marque['nomMarq']?></b> </p>
                <p class="desc" > <a href="DetailProduit.html">  <?= $row['label']?><br><?= $row['quantite']?> ML</p></a> 
                
                  <div class="prices">
                    <span class="nouvPrice"><?= $row['nouvprix']?>TND TTC</span>
                    <span class="oldPrice"> <?= $row['ancienprix']?>TND TTC</span>
                  </div>
      
                  <span ><button > <span class="ajout">Ajouter au panier</span><i class="fa fa-shopping-cart"></i></button></span>
                  <span><button class="fa fa-heart"></button></span>
        </div>
        <?php endforeach;?>

      </div>



      
  















  

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
