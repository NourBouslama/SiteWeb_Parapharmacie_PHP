<?php
include_once("models/categorie.php");
include_once("models/produits.php");
include_once("models/marque.php");
session_start() ;
$cat=new categorie();
$categs=$cat->listeCategfav();

$categos=$cat->listeCateg();


$prod=new produit();
$produits=$prod->listeProduitsVisagesPromos();


?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ma Parapharmacie en Ligne</title>
  <link rel="stylesheet" href="acceuil2.css">
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
          <li><a href="#">Accueil</a></li>
          <li><a href="Apropos.html">A Propos</a></li>
          <li><a href="Contact.php">Contact</a></li>
        </ul>
      </nav>
    </div>
    <div class="container2categ">
      <nav >
      <ul>
      <?php foreach($categos as $row): ?>

          <!-- <li ><a href="#"  >Marques <i class="fa fa-caret-down" aria-hidden="true" ></i></a></li>--> 
          <li><a href="Visage.php?id_categ=<?= $row['id_categorie'] ?>"> <?= $row['nomCateg'] ?> <i  aria-hidden="true" ></i></a></li>
          <?php endforeach;?>

         </ul>
      </nav>
    </div>
   <br>
   
  </header>

<br><br><br><br><br><br><br> <br>

  <body>
    <div id="carousel">
      <div class="images">
        <img src="images/silderimg2.png" width="100%" alt="" class="slider1"/>
        <img src="images/slider2.png" width="100%" alt="" class="slider2"/>
        <img src="images/back444.png" width="100%" alt="" class="slider3"/>
      </div>
    </div>

   <br>
  
    <div class="container3">
      <p class="nouv"> Nos Promos</p> <br>
      <b class="categ1"> Visage</b>
      <br>
      <div class="container4">
        <img src="images/visage.png" class="categ1img" height="400px"  alt="">
        <?php foreach($produits as $row):
          
          $marq=new marque();
          $marque=$marq->getMarque($row['id_marque']);
          ?>
   
        <div class="product">
          <button class="detailBouton" onclick="window.location.href='DetailProduit.php?id=<?=$row['id']?>'">
            <img src="<?= $row['imageProd']?>" class="imgproduct"  alt="">

          </button>
          <p> <b><?= $marque['nomMarq']?></b> </p>
          <p class="desc" > <a href="DetailProduit.html"> <?= $row['label']?><br><?= $row['quantite']?> ML</p></a> 
          
            <div class="prices">
              <span class="nouvPrice"><?= $row['nouvprix']?>TND TTC</span>
              <span class="oldPrice"> <?= $row['ancienprix']?> TND TTC </span>
            </div>

            <span ><button onclick="window.location.href='panier2.php?id=<?=$row['id']?>'" > <span class="ajout">Ajouter au panier</span><i class="fa fa-shopping-cart"></i></button></span>

        </div>
        <?php endforeach;?>
      
      </div>
<br>


<b class="categ1"> Cheveux</b>
<div class="container4">
<img src="images/cheveux.png" class="categ1img" height="400px"  alt="">
        <?php 
        $produits=$prod->listeProduitsCheuveuxsPromos();
        
        foreach($produits as $row):
          
          $marq=new marque();
          $marque=$marq->getMarque($row['id_marque']);
          ?>
   
        <div class="product">
          <button class="detailBouton" onclick="window.location.href='DetailProduit.php?id=<?=$row['id']?>'">
            <img src="<?= $row['imageProd']?>" class="imgproduct"  alt="">

          </button>
          <p> <b><?= $marque['nomMarq']?></b> </p>
          <p class="desc" > <a href="DetailProduit.html"> <?= $row['label']?><br><?= $row['quantite']?> ML</p></a> 
          
            <div class="prices">
              <span class="nouvPrice"><?= $row['nouvprix']?>TND TTC</span>
              <span class="oldPrice"> <?= $row['ancienprix']?> TND TTC </span>
            </div>

            <span ><button onclick="window.location.href='panier2.php?id=<?=$row['id']?>'" id="ajoutPanier"> <span class="ajout">Ajouter au panier</span><i class="fa fa-shopping-cart"></i></button></span>

        </div>
        <?php endforeach;?>
      
      </div>
    </div>


    <br>
    <b class="categ1"> Nos coffrets</b>
          <div class="container4">
            <img src="images/coffret.PNG" class="categ1img" height="400px"  alt="">
    
            <div class="product">
              <img src="images/coffretFilorga.PNG" class="imgproduct"  alt="">
              <p> <b>FILORGA</b> </p>
              <p class="desc" > <a href="#">  Sérum booster à la vitamine C<br>30 ML</p></a> 
              
                <div class="prices">
                  <span class="nouvPrice">98,298 TND TTC</span>
                  <span class="oldPrice"> 122,873 TND TTC </span>
                </div>
    
                <span ><button > <span class="ajout">Ajouter au panier</span><i class="fa fa-shopping-cart"></i></button></span>
    
            </div>
    
            <div class="product">
              <img src="images/coffretnatura.PNG" class="imgproduct"  alt="">
              <p> <b>NATURE CEBERICA</b> </p>
              <p class="desc" > <a href="#">   Sérum anti- taches brunes 
               <br>30 ML</p></a> 
              
                <div class="prices">
                  <span class="nouvPrice">104,963 TND TTC</span>
                  <span class="oldPrice"> 123,486 TND TTC </span>
                </div>
                <span ><button > <span class="ajout">Ajouter au panier</span><i class="fa fa-shopping-cart"></i></button></span>
    
                
    
            </div>
    
            
    
            <div class="product">
              <img src="images/coffretFilorga2.PNG" class="imgproduct"  alt="">
              <p> <b>FILORGA</b> </p>
              <p class="desc" > <a href="#"> A
                Ampoule Anti-Ox Vitamine C 20%  
                <br>30 ML</p></a> 
              
                <div class="prices">
                  <span class="nouvPrice">104,963 TND TTC</span>
                  <span class="oldPrice"> 123,486 TND TTC </span>
                </div>
    
                <span ><button > <span class="ajout">Ajouter au panier</span><i class="fa fa-shopping-cart"></i></button></span>

                
            </div>
          </div>
        </div>
  
  
  
  <p class="nouv1" > Catégories préferées</p> <br><br><br>

  <div class="container22" >
    <?php foreach($categs as $categ):?>
    
   <div>
   <img src="<?= $categ['imageCateg']?>" style="width:200px;height:200px;"   onclick="window.location.href='Visage.php?id_categ=<?=$categ['id_categorie']?>'"> <br>
   <span><?=$categ['nomCateg']?></span>
     
   </div>
<?php endforeach;
?>
 </div>


  </div> <br> <br>
  <p class="ActBlog" > Articles de Blogs</p> <br>
  <div class="blogs">
      <div>
        <img src="images/spec/b1.PNG" alt="" onclick="window.location.href='Blog1.html'">
        <p onclick="window.location.href='Blog1.html'">Comment bien prendre soin de son <br> corps graçe aux activités physique</p>
        <button onclick="window.location.href='Blog1.html'">Lire la suite</button>
      </div>
      <div>
        <img src="images/spec/b2.PNG" alt="">
        <p>Sérum cils: pourquoi les préférer <br> et comment bien choisir?</p>
        <button>Lire la suite</button>
      </div>
      <div>
        <img src="images/spec/b3.PNG" alt="">
        <p>Comment gérer la constipation</p> <br>
        <button>Lire la suite</button>
      </div>
  </div>
<br><br><br>
<hr class="foot">
<script>
  /*document.getElementById("ajoutPanier").addEventListener("click", function() {
    
    $panier=new panier();
    $paniers=$panier->ajoutPanier($row['label'],$row['imageProd'],$row['nouvprix']);
?>
});*/
</script>
  <footer>
    <div class="specification">
      <div>
        <img src="images/spec/Livraison.PNG" alt="" ><br>
        <p>Livraison gratuite à partir <br> de 120 DT</p><br>

      </div>
      <div>
        <img src="images/spec/paiement.PNG" alt="" ><br>
        <p>Paiement à la livraision</p><br>
      </div>
      <div>
        <img src="images/spec/prg.PNG" alt=""><br>
        <p>Programe de fidélité</p><br>
      </div>
      <div>
        <img src="images/spec/prix.PNG" alt=""><br>
        <p>Meilleur prix garanti</p><br>
      </div>
      <div>
        <img src="images/spec/service.PNG" alt=""><br>
        <p>Service client à  <br> l'écoute</p><br>
      </div>
    </div>
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
