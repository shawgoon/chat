<?php
$user = "root";
$mdp = "";
$host = "localhost";
$dbName = "chat";

try
{
  $instance = new PDO ("mysql:host=".$host.";dbname=".$dbName, $user, $mdp);
} catch (PDOExeption $e){
  die('Erreur :'.$e->getMessage());
} ?>
