<?php

session_start();
include_once("models/connexion.php");
include_once("models/categorie.php");
include_once("models/produits.php");
include_once("models/marque.php");
include_once("models/panier.php");
include_once("models/user.php");

//supprimer les produits
   //si la variable del existe
   if(isset($_GET['del'])){
    $id_del = $_GET['del'] ;
    //suppression
    unset($_SESSION['panier'][$id_del]);
   }
   $email=$_SESSION['email'] ;

   $cat=new user();
   $resultat=$cat->getUser($email);
//$prod=new produit();
//$produits=$prod->getProduit($_GET['id']);
//$panier=new panier();
//$paniers=$panier->ajoutPanier($produits['label'],$produits['imageProd'],$produits['nouvprix']);
//$paniers=$panier->listePanier();
$ids = array_keys($_SESSION['panier']);
$con = mysqli_connect("localhost","root","","parapharmacie");
$products = mysqli_query($con, "SELECT * FROM produit WHERE id IN (".implode(',', $ids).")");
$conn = new PDO("mysql:host=localhost;dbname=parapharmacie;charset=utf8","root","");

extract($_POST);
if(isset($_POST["commander"])){

  //add command
  
  foreach($products as $commande):
  
  //requete
  $quantite=$commande['quantite'];
  $prix=$commande['nouvprix'];
  $image=$commande['imageProd'];
  $label=$commande['label'];
  $label=$commande['label'];
  $date = date("Y-m-d");



  

$req = $conn->prepare('insert into commande(label,image,prix,quantite,idClient,dateCmd)values (?, ?, ?, ?, ?, ?)');
$req->execute(array($label,$image,$prix,$quantite,$resultat['idU'],$date));



//exit;
  endforeach;
  foreach($ids as $id):
    unset($_SESSION['panier'][$id]);
  endforeach;

  header("Location:panier.php") ;

}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ma Parapharmacie en Ligne</title>
  <link rel="stylesheet" href="panier2.css">
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

   
    <b class="categ1"> Panier</b>
  
    <main class="table">
      
      <section class="table__body">
      <form id="form" name="form" method="post" class="form">
          <table>
              <thead>
                  <tr>
                      <th>  <span class="icon-arrow">Produit</span></th>
                      <th>  <span class="icon-arrow">Description</span></th>
                      <th>  <span class="icon-arrow" >Prix</span></th>
                      <th>  <span class="icon-arrow">Quantité</span></th>
                      <th>  <span class="icon-arrow" >Total</span></th>
                      <th>  <span class="icon-arrow">Action </span></th>
                  </tr>
              </thead>
              <tbody>

              <?php 
              $total = 0 ;
              // liste des produits
              //récupérer les clés du tableau session
              $ids = array_keys($_SESSION['panier']);
              //s'il n'y a aucune clé dans le tableau
              if(empty($ids)){
                echo "Votre panier est vide";
              }else {
                //si oui 
                $con = mysqli_connect("localhost","root","","parapharmacie");

                $products = mysqli_query($con, "SELECT * FROM produit WHERE id IN (".implode(',', $ids).")");
                //lise des produit avec une boucle foreach
                foreach($products as $product):
                  
                    //calculer le total ( prix unitaire * quantité) 
                    //et aditionner chaque résutats a chaque tour de boucle
                    $total = $total + $product['nouvprix'];
                
                ?>


                  <tr> 
                    <td>   <img src="<?= $product['imageProd']?>" > </td>
                    <input type="hidden" name="image" value="<?= $product['imageProd']?>" style="display: none;" />
                    <td > 
                    <?= $product['label']?>
                    <input type="hidden" name="label" value="<?= $product['label']?>"  style="display: none;" />    </td>
                    <td > <input type="number" id="Prix" class="Prix" name="prix" value="<?= $product['nouvprix']?>" readonly > </td>
                    <td> <input type="number"  id="qte" name="quantite" class="qte"  value="1" > </td>
                    <td> <input type="number"  id="total" class="total"  value="<?= $product['nouvprix']?>" readonly ></td>
                    <td> <i class="fa fa-trash" aria-hidden="true" onclick="window.location.href='panier.php?del=<?=$product['id']?>'"></i> </td>
                  </tr>
                  <?php endforeach ;
               
                 } 
                  
                  

                  ?>
              </tbody>

            
          </table>
         
        
      </section>
      <aside class="total">
        <h2>Votre panier</h2>
        <span > articles</span>
        <span class="wide"><?=$total?> TND</span> <br>
        <span >Livraison </span>
        <span class="wide">7 TND</span> <br>
        <span > <strong>Total TTC</strong> </span>
        <span class="wide"> <strong><?=$total + 7?> TND</strong> </span> <br>
        <p>Vous avez un code promos?</p> <br>
        <!---
                <button> <strong>Commander</strong> </button> 

        !-->
        <input type="submit" name="commander" class="commander" value="commander" />
        </form>
    
      </aside>
  </main>



  <!--
   <script>


function calculerTotal() {
  var quantite = parseInt(document.getElementById("qte").value);
  var prix = parseInt(document.getElementById("Prix").value);
  var total = quantite * prix;
  document.getElementById("total").value = total;
}
 </script> 
  
  -!-->
  












    

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
