<!DOCTYPE html>
<html>
  <head>
    <title>Modifier un rendez-vous</title>
    <link rel="stylesheet" type="text/css" href="public/css/global.css" />
  </head>
  <body>
    <?php include(__DIR__ . '/header.php') ?>
    <h1>Modifier un rendez-vous</h1>
    <form method="POST" action="?action=edit">
      <input type="hidden" name="confirmation_number" value="<?= $confirmationNumber ?>" />
      <p>
        <label for="date_input">Date:</label>
        <select id="date_input" name="date">
          <?php
            foreach ($dateList as $date) {
              echo "<option value=\"$date\">$date</option>";
            }
          ?>
        </select>
      </p>
      <p>
        <label for="time_input">Heure:</label>
        <select id="time_input" name="time">
          <?php
            foreach ($timeList as $time) {
              echo "<option value=\"$time\">$time</option>";
            }
          ?>
        </select>
      </p>
      <!-- AJOUTER DU CODE CI-DESSOUS -->
      
      <!-- FIN DU CODE AJOUTÉ -->
      <p>
        <input type="submit" name="submit" value="Soumettre" />
      </p>
    </form>
    <p>
      <a onclick="return confirm('Voulez-vous vraiment annuler votre rendez-vous?')" href="?action=delete&confirmation_number=<?= $confirmationNumber ?>">Annuler le rendez-vous</a>
    </p>
  </body>
</html>
