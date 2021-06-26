<!DOCTYPE html>
<html>
  <head>
    <title>Infos de l'utilisateur</title>
  </head>
  <body>
    <h1>Infos de l'utilisateur</h1>
    <p>
      Prénom:
      <?= $user['first_name'] ?>
    </p>   
    <p>
      Nom:
      <?= $user['last_name'] ?>
    </p> 
    <a href="?action=logout">Se déconnecter</a>
  </body>
</html>