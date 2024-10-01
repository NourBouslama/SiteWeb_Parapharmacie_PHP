
<?php
include_once("../models/categorie.php");
include_once("../models/produits.php");
include_once("../models/commande.php");
include_once("../models/user.php");
session_start() ;



$prod=new commande();
$produits=$prod->listecommande();

?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

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
			<li >
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
            <li class="active">
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
							<a class="active" href="#">Commandes</a>
						</li>
					</ul>
				</div>
			</div>

            
       
                       


			<div class="table-data">
				<div class="order">
					<div class="head">
                    <h3>Les Commandes</h3>
                    <a href="ajoutProd.php" class="btn-download">
					
				</a>
				
					</div>
					<table>
						<thead>
							<tr>
                                <th>Prénom Client</th>
								<th>Label</th>
                                <th>Image</th>
                                <th>Date Commande</th>
                                <th>Prix</th>
                                <th>Supprimer</th>
                                <th>Valider</th>

							</tr>
						</thead>
						<tbody>
                        <?php foreach($produits as $row):
                                 $users=new user();
                                 $user=$users->getUserId($row['idClient']);
        
                ?>
							<tr>
                                <td style="font-size: 15px;"><?= $user['prenom']?></td>
								<td style="font-size: 15px;"><?= $row['label']?></td>
                                <td> <img src="../<?= $row['image']?>" ></td>
                                <td><?= $row['dateCmd']?></td>
								<td><?= $row['prix']?></td>
                                <td> <button  onclick="window.location.href='suppCommande.php?id=<?=$row['idCmd']?>'"> <i class="bx bx-trash"></i> </button> </td>
                                <td> <button  onclick="window.location.href='ValiderCommande.php?id=<?=$row['idCmd']?>'"> <i class="bx bx-check"></i> </button> </td>

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