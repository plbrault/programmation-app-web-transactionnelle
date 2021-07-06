<!DOCTYPE html>
<html>
  <head>
    <title>Inscription</title>
  </head>
  <body>
    <h1>Inscription</h1>
    <?php
      if ($errorMessage) {
        echo "<p>$errorMessage</p>";
      }
    ?>
    <form method="POST" action="?action=register">
      <p>
        <label for="username_input">Nom d'utilisateur:</label>
        <input type="text" name="username" id="username_input" required value="<?= isset($username) ? $username : '' ?>" />
      </p>
      <p>
        <label for="first_name_input">Prénom:</label>
        <input type="text" name="first_name" id="first_name_input" required value="<?= isset($firstName) ? $firstName : '' ?>" />
      </p>
      <p>
        <label for="last_name_input">Nom:</label>
        <input type="text" name="last_name" id="last_name_input" required value="<?= isset($lastName) ? $lastName : '' ?>" />
      </p>               
      <p>
        <label for="password_input">Mot de passe:</label>
        <input type="password" name="password" id="password_input" required />
      </p>
      <p>
        <label for="password_confirm_input">Mot de passe (confirmation):</label>
        <input type="password" name="password_confirm" id="password_confirm_input" />
      </p>
      <p>
        <input type="submit" value="Soumettre" />
      </p>         
    </form>
  </body>
</html>