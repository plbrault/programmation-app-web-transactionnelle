<!DOCTYPE html>
<html>
  <head>
    <title>Modifier un rendez-vous</title>
    <link rel="stylesheet" type="text/css" href="public/css/global.css" />
  </head>
  <body>
    <?php include(__DIR__ . '/header.php') ?>
    <h1>Modifier un rendez-vous</h1>
    <?php
      if ($invalidConfirmationNumber) {
        echo '<p class="error_message">Le numéro de confirmation que vous avez entré est invalide.</p>';
      }
    ?>
    <p>
      Entrer le numéro de confirmation de votre rendez-vous:
    </p>
    <form method="get">
      <input type="hidden" name="action" value="edit" />
      <input name="confirmation_number" type="text" />
      <input type="submit" value="Valider" />
    </form>
  </body>
</html>
