<!DOCTYPE html>
<html>
  <head>
    <title>Accès restreint</title>
  </head>
  <body>
    <?php include(__DIR__ . '/header.php') ?>
    <h1>Accès restreint</h1>
    <?php
      if ($wrongPassword) {
        ?> <p class="error_message">Le mot de passe saisi est invalide.</p>  <?php
      }
    ?>
    <p>Veuillez entrer le mot de passe ci-dessous:</p>
    <form action="?action=list" method="POST">
      <label for="password_input">Mot de passe:</label>
      <input type="password" id="password_input" name="password" />
      <input type="submit" name="submit" value="Valider" />
    </form>
  </body>
</html>
