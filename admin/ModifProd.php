
<?php
include_once("../models/categorie.php");
include_once("../models/produits.php");
include_once("../models/marque.php");
session_start() ;


$prod=new produit();
$prods=$prod->getProduit($_GET['id']); 

$cat=new categorie();
$categs=$cat->listeCateg();

$marq=new marque();
$marqs=$marq->listeMarque();

$nom_serveur = "localhost";
$utilisateur = "root";
$mot_de_passe ="";
$nom_base_données ="parapharmacie" ;
$con = mysqli_connect($nom_serveur , $utilisateur ,$mot_de_passe , $nom_base_données);

$sql = "select * from categorie";
$resultat = mysqli_query($con, $sql);

$sql2 = "select * from marque";
$resultat2 = mysqli_query($con, $sql2);

if(!empty($_POST)){
    extract($_POST);
    if(isset($_POST["envoyer"])){
      $label= (String) trim($label);
      $categorie_id=  trim($categorie_id);
      $marque_id=  trim($marque_id);
      $image= (String) trim($image);
      $prix=  trim($prix);
      $stock= trim($stock);
      $description= (String) trim($description);
     // $mdp= crypt($mdp, '$2y$10$abcdefghijkmnopqrstuvwxyz012345');
  $image="images/".$image;

     
      $con = new PDO("mysql:host=localhost;dbname=parapharmacie;charset=utf8","root","");
  
  $req = $con->prepare('UPDATE produit SET label = ?,id_categ = ?,id_marque = ?,imageProd = ?,description = ?,nouvprix = ?,stock = ? WHERE id= ?');
  $req->execute(array($label,$categorie_id,$marque_id,$image,$description,$prix,$stock,$_GET['id']));
  header("Location:Produits.php") ;
    exit;
  
  }

}

?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

	<!-- My CSS -->
	<link rel="stylesheet" href="style2.css">

	<title>Admin</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">Admin</span>
		</a>
		<ul class="side-menu top">
			<li >
				<a href="index.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li class="active">
				<a href="Produits.php">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Les Produits</span>
				</a>
			</li>
			<li>
				<a href="Categories.php">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Les Categories</span>
				</a>
			</li>
			<li>
				<a href="Marques.php">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Les Marques</span>
				</a>
			</li>
			<li>
				<a href="Clients.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Les Clients</span>
				</a>
			</li>
			<li>
				<a href="Messages.php">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Les Messages</span>
				</a>
			</li>
			<li>
				<a href="Commande.php">
					<i class='bx bxs-shopping-bag' ></i>
					<span class="text">Les Commandes</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">paramétre</span>
				</a>
			</li>
			<li>
				<a href="../conn.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Deconnexion</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<form action="#">
				
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a>
	
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="index.php">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Ajout produit</a>
						</li>
					</ul>
				</div>
			</div>

            
       
                       


			<div class="table-data">
				<div class="order">
					<div class="head">
                    <h3>Ajout Produit</h3>
                   
					</div>
				



                    <form  id="form" name="form" method="post" class="form">

<div class="form-control ">
    <label for="nom">label :</label>
    <input type="text" id="label" name="label" value="<?=$prods['label']?>" >

</div> <br>
    
<div class="form-control ">
  <label for="email">categorie :</label>
  <select id="categorie_id" name="categorie_id">
      <?php while ($row = mysqli_fetch_array($resultat)) : ?>
        <option value="<?php echo $row['id_categorie']; ?>"><?php echo $row['nomCateg']; ?></option>
      <?php endwhile; ?>
    </select>  
  </div> <br>
    

  <div class="form-control ">
    <label for="email"> marque :</label>
    <select id="marque_id" name="marque_id">
      <?php while ($row = mysqli_fetch_array($resultat2)) : ?>
        <option value="<?php echo $row['idMarq']; ?>" ><?php echo $row['nomMarq']; ?></option>
      <?php endwhile; ?>
    </select>   
    </div> <br>

    <div class="form-control ">
  <label for="message">Image :</label>
  <input type="file" id="image" name="image" value="<?=$prods['imageProd']?>">
  <!--
  <input type="submit" id="image" name="upload" value="upload">

  -->


  </div> <br>

    <div class="form-control ">
  <label for="message">Prix :</label>
  <input type="text" id="prix" name="prix" value="<?=$prods['nouvprix']?>">

  </div> <br>

  <div class="form-control ">
  <label for="message">Stock :</label>
  <input type="number" id="stock" name="stock" value="<?=$prods['stock']?>">

  </div> <br>


<div class="form-control ">
  <label for="message">Description :</label>
  <textarea id="description" name="description" value="<?=$prods['description']?>"></textarea>

  </div> <br>




        <input type="submit" value="Envoyer" class="envoyer" name="envoyer">
    </form>
			
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="script.js"></script>
</body>
</html>