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
// On supprime la session, ce qui va déconnecter l'utilisateur
unset($_SESSION['user']);
 ?>
<h4>Vous êtes déconnecté !</h4>
<a href="front/index.html">Vous connectez</a>
