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

// si le poste n'est pas vide cela veut dire que l'on envoi des données =>
// on ajoute un massage
// sinon on récup de la liste des messages
if (!empty($_POST)) {
  // on ajoute le msg en BDD
  $insertQuery = $instance -> prepare ("INSERT INTO message (contenu, utilisateur_id) VALUES (:contenu, :utilisateur_id)");
  $insertQuery -> execute(array(
    "contenu" => $_POST['contenu'],
    "utilisateur_id" => $_POST['utilisateur_id']
  ));
  // on retourne un success

  header('Content-Type: application/json');
  // je dis que ma réponse est du JSON pas HTML
  // je formate une réponse en JSON
  echo json_encode(array("success" => true));
} else {
// recup de la liste des messages
$msgList = $instance->query('SELECT * FROM message')->fetchAll();
// je renvois un réponse au front
header('Content-Type: application/json');
// je dis que ma réponse est du JSON pas HTML
// je formate une réponse en JSON
echo json_encode(array("success" => true, "msg" => $msgList));
}

 ?>
