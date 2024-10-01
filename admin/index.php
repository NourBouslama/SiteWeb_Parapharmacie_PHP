<?php
include_once("../models/categorie.php");
include_once("../models/produits.php");
include_once("../models/marque.php");
include_once("../models/commande.php");
include_once("../models/user.php");
$nom_serveur = "localhost";
       $utilisateur ="root";
       $mot_de_passe ="";
       $nom_base_données ="parapharmacie";
       $con = mysqli_connect($nom_serveur , $utilisateur ,$mot_de_passe , $nom_base_données);
       //requete pour selectionner  l'utilisateur qui a pour email et mot de passe les identifiants qui ont été entrées
        $req = mysqli_query($con , "SELECT * FROM utilisateurs WHERE role = 'client'") ;
		$req1 = mysqli_query($con , "SELECT * FROM produit") ;
		$req2 = mysqli_query($con , "SELECT * FROM commande") ;
        //Compter le nombre de ligne ayant rapport a la requette SQL
		
        $num_ligne_client = mysqli_num_rows($req) ;
		$num_ligne_produit = mysqli_num_rows($req1) ;
		$num_ligne_commande = mysqli_num_rows($req2) ;
		$prod=new commande();
		$produits=$prod->listeNewCommandes();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="style.css">

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
			<li class="active">
				<a href="index.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li >
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
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Acceuil</a>
						</li>
					</ul>
				</div>
				<!--
<a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download PDF</span>
				</a>
				-->
				
			</div>

			<ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<h3><?= $num_ligne_produit?></h3>
						<p> Total Produits </p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3><?= $num_ligne_client  ?></h3>
						<p>Total Clients</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-dollar-circle' ></i>
					<span class="text">
						<h3><?=  $num_ligne_commande ?></h3>
						<p>Total commandes</p>
					</span>
				</li>
			</ul>


			<div class="table-data" style="width:800px;">
				<div class="order">
					<div class="head">
						<h3>Les commandes recentes</h3>
			
					</div>
					<table>
						<thead>
							<tr>
								<th>Produit</th>
								<th>Date Commande</th>
								<th>Prix</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach($produits as $row):
                                 $users=new user();
                                 $user=$users->getUserId($row['idClient']);
        
                ?>
					<tr>        
						      <td> <img src="../<?= $row['image']?>" ></td>
                                <td style="font-size: 15px;"><?= $row['dateCmd']?></td>
                        
								<td><?= $row['prix']?></td>
							
                               
							</tr>
                            <?php endforeach;?>
						</tbody>
					</table>
				</div>
				
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="script.js"></script>
</body>
</html>