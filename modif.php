<?php
include_once("models/user.php");
    $cat=new user();
if(isset($_POST["modifier"])){

  $res=$cat->modifUser(1,"nour1","bouslama1","korba1","nour@gmail.com","123@nour");
  header("Location:conn.php") ;
}

    ?>