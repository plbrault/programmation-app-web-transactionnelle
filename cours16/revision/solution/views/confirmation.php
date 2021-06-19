<!DOCTYPE html>
<html>
  <head>
    <title>Rendez-vous modifié</title>
  </head>
  <body>
    <?php include(__DIR__ . '/header.php') ?>
    <h1>Rendez-vous créé</h1>
    <p>
      Numéro de confirmation: <strong><?= $confirmationNumber ?></strong>
    </p>
    <p>
      Conservez ce numéro de confirmation en lieu sûr. Vous en aurez besoin pour modifier ou annuler votre rendez-vous.
    </p>
  </body>
</html>
