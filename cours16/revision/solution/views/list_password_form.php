<!DOCTYPE html>
<html>
  <head>
    <title>Accès restreint</title>
  </head>
  <body>
    <h1>Accès restreint</h1>
    <p>Veuillez entrer le mot de passe ci-dessous:</p>
    <form action="?action=list" method="POST">
      <label for="password_input">Mot de passe:</label>
      <input type="password" id="password_input" name="password" />
      <input type="submit" name="submit" value="Valider" />
    </form>
  </body>
</html>
