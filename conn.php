<?php 

include_once("models/user.php");





 //Nous allons démarrer la session avant toute chose
   session_start() ;
  if(isset($_POST['boutton-valider'])){ // Si on clique sur le boutton , alors :
    //Nous allons verifiér les informations du formulaire
    if(isset($_POST['email']) && isset($_POST['mdp'])) { //On verifie ici si l'utilisateur a rentré des informations
      //Nous allons mettres l'email et le mot de passe dans des variables
      $email = $_POST['email'] ;
      $mdp = $_POST['mdp'] ;
      $erreur = "" ;
       //Nous allons verifier si les informations entrée sont correctes
       //Connexion a la base de données
       $nom_serveur = "localhost";
       $utilisateur = "root";
       $mot_de_passe ="";
       $nom_base_données ="parapharmacie" ;
       $con = mysqli_connect($nom_serveur , $utilisateur ,$mot_de_passe , $nom_base_données);
       //requete pour selectionner  l'utilisateur qui a pour email et mot de passe les identifiants qui ont été entrées
        $req = mysqli_query($con , "SELECT * FROM utilisateurs WHERE mail = '$email' AND mdp ='$mdp' ") ;
        $num_ligne = mysqli_num_rows($req) ;//Compter le nombre de ligne ayant rapport a la requette SQL
        /*if($num_ligne > 0){
            header("Location:acceuil.php") ;//Si le nombre de ligne est > 0 , on sera redirigé vers la page bienvenu
            // Nous allons créer une variable de type session qui vas contenir l'email de l'utilisateur
            $_SESSION['email'] = $email ;
        }else {//si non
            $erreur = "Adresse Mail ou Mots de passe incorrectes !";
        }*/

        $use=new user();
        $users=$use->getUser($email);
 
        if($num_ligne > 0){
            if($users['role'] == 'admin'){
                header("Location:admin/index.php") ;
            }else if ($users['role'] == 'client'){
                header("Location:acceuil.php") ;
                $_SESSION['email'] = $email ;
            }
        }

        
        else {//si non
            $erreur = "Adresse Mail ou Mots de passe incorrectes !";
        }

        
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Animated Login Form</title>
	<link rel="stylesheet" type="text/css" href="conn1.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div class="container">
		<div class="img">
		</div>
		<div class="login-content">
      
			<form action="" method="POST">
                <!--<img src="images/avatar.svg">-->
				<img src="images/avatar.svg">
				<h2 class="title">Bienvenu</h2>
				<?php 
       if(isset($erreur)){// si la variable $erreur existe , on affiche le contenu ;
           echo "<p class= 'Erreur'>".$erreur."</p>"  ;
       }
       ?>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Adresse mail:</h5>
           		   		<input type="text" class="input" name="email">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Mot de passe:</h5>
           		    	<input type="password" class="input" name="mdp">
            	   </div>
            	</div>
            	<input type="submit" class="btn" value="connexion" name="boutton-valider">
                    
                    <a href="Register.php">Créer un compte?</a>

                    
            </form>
        </div>
    </div>
    <script type="text/javascript" src="conn.js"></script>
</body>
</html>