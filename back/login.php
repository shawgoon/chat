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

<?php
// on récupère les données envoyé par le front en AJAX
$credentials = array(
  "pseudo" => ($_POST['pseudo']),
  "password" => ($_POST['password'])
);

// on récupère l'utilisateur en BDD
$userQuery = $instance->prepare("SELECT *
FROM utilisateur
WHERE utilisateur.pseudo = :pseudo");
$userQuery->execute(array("pseudo" => $credentials['pseudo']));
$user = $userQuery->fetch();
// si un utilisateur existe avec ce pseudo
if($user) {
  // on test le mot de passe
  if ($user['password'] === $credentials['password']) {
    // si le mdp est bon je connecte l'utilisateur
    $userConnected = true;
  } else {
    // le mdp n'est pas bon, je ne connecte pas l'utilisateur
    $userConnected = false;
  }
} else { //si il n'y a pas d'utilisateur avec ce pseudo on l'ajoute
    $insertUserQuery = $instance->prepare("INSERT INTO utilisateur (pseudo, password)
    VALUES (:pseudo, :password)");
    $newUser = $insertUserQuery->execute(array(
      'pseudo' => $credentials['pseudo'],
      'password' => $credentials['password']
    ));
    // une fois crée, je connecte l'utilisateur
    $userConnected = true;
  }

  // je renvoi la réponse en JSON au front
  header('Content-Type: application/json');
  // j'indique que ma réponse contien du JSON et non du HTML
  // je formate une réponse en JSON
  echo json_encode(array("success" => $userConnected));
