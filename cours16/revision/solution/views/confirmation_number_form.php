<!DOCTYPE html>
<html>
  <head>
    <title>Modifier un rendez-vous</title>
  </head>
  <body>
    <h1>Modifier un rendez-vous</h1>
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
