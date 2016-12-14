<?php include('../pdo.php'); ?>

<?php include('../header.php'); ?>

<?php $utilisateur = array(
  "pseudo" => "",
  "password" => ""
);
?>
    <div class="form">
      <form id="signup" action="confirm.php" method="post">
        <h2>Inscription</h2>
        <label for="">Pseudo</label>
        <input id="nom" class="input" type="text" name="pseudo" value="">
        <label for="">Mot de passe</label>
        <input id="password" class="input" type="password" name="password" value="">
        <input type="hidden" name="userCreate" value="true">
        <input class="button input" type="submit" value="s'inscrire">
      </form>
    </div>
    <div class="form">
      <h2>Login</h2>
      <form id="login" action="../login.php" method="post">
        <label for="">Pseudo</label>
        <input id="pseudo" class="input" type="text" name="pseudo" value="">
        <label for="">Mot de passe</label>
        <input id="passlog" class="input" type="password" name="password" value="">
        <input class="button input" type="submit" name="userId" value="connection">
      </form>
    </div>
  <?php include('../footer.php'); ?>
