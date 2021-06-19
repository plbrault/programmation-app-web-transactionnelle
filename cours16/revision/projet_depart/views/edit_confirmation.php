<!DOCTYPE html>
<html>
  <head>
    <title>Rendez-vous modifié</title>
    <link rel="stylesheet" type="text/css" href="public/css/global.css" />
  </head>
  <body>
    <?php include(__DIR__ . '/header.php') ?>
    <h1>Rendez-vous modifié</h1>
    <p>
      Votre rendez-vous a été modifié avec succès.
    </p>
    <p>
      Numéro de confirmation: <strong><?= $confirmationNumber ?></strong>
    </p>
  </body>
</html>
