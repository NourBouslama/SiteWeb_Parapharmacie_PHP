<?php 
include_once("models/user.php");



if(!empty($_POST)){
  extract($_POST);
  if(isset($_POST["envoyer"])){
    $prenom= (String) trim($prenom);
    $nom= (String) trim($nom);
    $message= (String) trim($message);
    $mail= (String) trim($mail);
    $mdp= (String) trim($mdp);
   
   
    $con = new PDO("mysql:host=localhost;dbname=parapharmacie;charset=utf8","root","");

$req = $con->prepare('insert into utilisateurs (prenom,nom,mail,adresse,mdp)values (?, ?, ?, ?, ?)');
$req->execute(array($prenom,$nom,$mail,$adresse,$mdp));
header("Location:conn.php") ;
  exit;

}

}
?>


<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!---<title> Responsive Registration Form | CodingLab </title>--->
    <link rel="stylesheet" href="Register1.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="title">Créer mon compte</div>
    <div class="content">
      <form  name="form" method="post" class="form">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Prénom</span>
            <input type="text" id="prenom" name="prenom" required>
          </div>
          <div class="input-box">
            <span class="details">Nom</span>
            <input type="text" id="nom" name="nom" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" id="mail" name="mail"  required>
          </div>
          <div class="input-box">
            <span class="details">Adresse</span>
            <input type="text" id="adresse" name="adresse" required>
          </div>
          <div class="input-box">
            <span class="details">Mot de passe</span>
            <input type="text" id="mdp" name="mdp" required>
          </div>
          <div class="input-box">
            <span class="details">Confirmer Password</span>
            <input type="text"  required>
          </div>
        </div>
      
        <div class="button">
          <input type="submit" value="Register"  name="envoyer">
        </div>
      </form>
    </div>
  </div>

</body>
</html>
