<?php
include_once("models/categorie.php");
include_once("models/produits.php");
include_once("models/marque.php");
session_start() ;

$cat=new categorie();
$categs=$cat->listeCategfav();
$categbyid=$cat->getCategorie($_GET['id_categ']);

$prod=new produit();
$produits=$prod->listeProduitsByCateg($_GET['id_categ']);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ma Parapharmacie en Ligne</title>
  <link rel="stylesheet" href="visage2.css">
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

<br><br><br><br><br><br><br> <br>

<body>

  <div class="container3">
  <p class="nouv"> Produits du <?= $categbyid['nomCateg']?></p> <br>
        <img src="<?= $categbyid['imgCategdesc']?>" alt="" style="width: 1300px; margin-left: 12px;"> <br> <br>
        <p class="descVisage"><?= $categbyid['desc_categ']?>

      

      <br>
      <div class="container4">
         
      <?php foreach($produits as $row):
                 $marq=new marque();
                 $marque=$marq->getMarque($row['id_marque']);
                ?>
        <div class="product">
        <img src="<?= $row['imageProd']?>" class="imgproduct"  alt=""  onclick="window.location.href='DetailProduit.php?id=<?=$row['id']?>'">
                <p class="marque"> <b><?= $marque['nomMarq']?></b> </p>
                <p class="desc" > <a href="DetailProduit.html">  <?= $row['label']?><br><?= $row['quantite']?> ML</p></a> 
                
                  <div class="prices">
                    <span class="nouvPrice"><?= $row['nouvprix']?>TND TTC</span>
                    <span class="oldPrice"> <?= $row['ancienprix']?>TND TTC</span>
                  </div>
      
                  <span ><button onclick="window.location.href='panier2.php?id=<?=$row['id']?>'" id="ajoutPanier" > <span class="ajout">Ajouter au panier</span><i class="fa fa-shopping-cart"></i></button></span>
        </div>
        <?php endforeach;?>

      </div>
      <script>
        /*
  document.getElementById("ajoutPanier").addEventListener("click", function() {
    
    $panier=new panier();
    $paniers=$panier->ajoutPanier($row['label'],$row['imageProd'],$row['nouvprix']);
?>
});
*/
</script>

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
