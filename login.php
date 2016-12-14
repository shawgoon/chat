<?php include('/pdo.php'); ?>
<?php include('/header.php');

$connected = false; ?>

<?php if (isset($_POST['pseudo']) && isset($_POST['password'])) {

  $sql = "SELECT *
  FROM utilisateur
  WHERE pseudo = '".$_POST['pseudo']."'AND password = '".$_POST['password']."'";
  $user = $instance->query($sql)->fetch();
  var_dump($instance);

  if ($user) {
    $_SESSION['user'] = array(
      "userName" => $user['pseudo'],
      "userId" => $user['id']
    );
    $connected = true;
    $message = "Connecté !";
  } else {
    $message = "identifiants incorrect !";
  }
}?>

<div class="">
<?php if (isset($message)) { ?>
  <p><?php echo $message ?></p>
  <?php if ($connected) { ?>
    <?php header('Location: http://localhost/j1/chat/front/chat.php');
    exit();?>
  <?php } ?>
<?php } ?>
<?php if (!$connected) { ?>
  <?php
     header('Location: http://localhost/j1/chat/front/index.php');
    exit();
  ?>
<?php } ?>
</div>

<?php include('/footer.php'); ?>
