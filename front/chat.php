<?php include('../pdo.php'); ?>

<?php include ('../header.php'); ?>

    <div class="form">
      <div class="stock-msg">
        <p class="msg"><?php  ?></p>
      </div>
      <hr>
      <form class="" action="chat.php" method="post">
        <label for="">Entrer votre message ici</label>
        <textarea name="name" rows="3" cols="80"></textarea>
        <input class="env-text" type="submit" name="msg" value="envoyer">
      </form>
    </div>

  <?php include ('../footer.php'); ?>
