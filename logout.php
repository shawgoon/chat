<?php
include('/header.php');

// On supprime la session, ce qui va déconnecter l'utilisateur
unset($_SESSION['user']);
 ?>
<h4>Vous êtes déconnecté !</h4>
<a href="front/index.php">Vous connectez</a>

<?php include('/footer.php'); ?>
