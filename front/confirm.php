<?php include('../pdo.php'); ?>

<?php include('../header.php'); ?>

<?php $utilisateur = array(
  "pseudo" => "",
  "password" => "",
);

?>

<!-- si on veut créer un utilisateur -->
<?php
if (isset($_POST['userCreate'])){
  $pseudo = ($_POST['pseudo']);
  $password = ($_POST['password']);

  $sql = "INSERT INTO utilisateur (pseudo, password) VALUES (?, ?)";
  $createSuccess = $instance->prepare($sql);
  $createSuccess -> execute(array($pseudo, $password));
?>
<!-- confirmation de l'inscription -->
<?php
if($createSuccess){
 ?><h2>Salut <?php echo $_POST['pseudo'] ?></h2>
 <p class="inscription">ton inscription est bien prise en compte</p>
 <p class="inscription">Tu peux maintenant te connecter avec tes identifiants</p>
 <p class="inscription"><a href="index.php">retour au formulaire</a></p>
 <?php
  }
}?>

<?php include('../footer.php'); ?>
