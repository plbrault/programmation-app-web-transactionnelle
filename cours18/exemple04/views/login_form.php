<!DOCTYPE html>
<html>
  <head>
    <title>Connexion</title>
  </head>
  <body>
    <h1>Connexion</h1>
    <?php
      if ($loginFailed) {
        echo "<p>Oups! Le nom d'utilisateur ou le mot de passe que vous avez entré est invalide.</p>";
      }
    ?>
    <form method="POST" action=".">
      <p>
        <label for="username_input">Nom d'utilisateur:</label>
        <input type="text" name="username" id="username_input" required />
      </p>
      <p>
        <label for="username_input">Mot de passe:</label>
        <input type="password" name="password" id="password_input" required />
      </p>
      <p>
        <input type="submit" value="Valider" />
      </p>
    </form>
  </body>
</html>