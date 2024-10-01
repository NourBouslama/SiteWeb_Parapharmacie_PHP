<?php
abstract class Connexion {
protected $pdo;
const host="localhost";
const user="root";
const login="";
const bd="parapharmacie";
function __construct(){
 $this->pdo=new PDO("mysql:host=".self::host.";dbname=".self::bd,self::user, self::login);
}
function __destruct(){
 $this->pdo=null;
}
}?>