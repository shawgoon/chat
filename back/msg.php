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
} catch (PDOExeption $e){
  die('Erreur :'.$e->getMessage());
}
// récupération de la liste des messages
$msgList = $instance->query('SELECT * FROM message')->fetchAll();
// je renvois un réponse au front
header('Content-Type: application/json');
// je dis que ma réponse est du JSON pas HTML
// je formate une réponse en JSON
echo json_encode(array("success" => true, "msg" => $msgList));
 ?>
