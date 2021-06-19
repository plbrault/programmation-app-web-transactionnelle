<!DOCTYPE html>
<html>
  <head>
    <title>Prendre un rendez-vous</title>
    <link rel="stylesheet" type="text/css" href="public/css/global.css" />
  </head>
  <body>
    <?php include(__DIR__ . '/header.php') ?>
    <h1>Prendre un rendez-vous</h1>
    <form method="POST" action="?action=add">
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
      <p>
        <label for="last_name_input">Nom:</label>
        <input type="text" id="last_name_input" name="last_name" required />
      </p>
      <p>
        <label for="first_name_input">Prénom:</label>
        <input type="text" id="last_name_input" name="first_name" required />
      </p>
      <p>
        <label for="phone_number_input">Numéro de téléphone:</label>
        <input type="text" id="phone_number_input" name="phone_number" required /> 
      </p>
      <p>
        <label for="phone_number_input">Adresse courriel:</label>
        <input type="text" id="email_input" name="email" required /> 
      </p>
      <p>
        <input type="submit" name="submit" value="Soumettre" />
      </p>      
    </form>
  </body>
</html>
