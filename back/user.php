<?php
$user = "root";
$mdp = "";
$host = "localhost";
$dbName = "chat";

try
{
  $instance = new PDO ("mysql:host=".$host.";dbname=".$dbName, $user, $mdp, array(
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
  ));
} catch (PDOException $e){
  die('Erreur :'.$e->getMessage());
}
// recupération de la liste de utilisateur
$userList = $instance->query('SELECT pseudo FROM utilisateur')->fetchAll();
// je renvoi ma réponse en JSON au front
header('Content-Type: application/json');
// j'indique que ma réponse contien du JSON et non du HTML
// je formate une réponse en JSON
echo json_encode(array("success" => true, "utilisateur" => $userList));
