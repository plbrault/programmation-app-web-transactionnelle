<!DOCTYPE html>
<html>
  <head>
    <title>Liste des rendez-vous</title>
  </head>
  <body>
    <h1>Liste des rendez-vous</h1>
    <table>
      <tr>
        <th>Date</th>
        <th>Heure</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Tél</th>
        <th>Courriel</th>
        <th># confirmation</th>
      </tr>
    <?php
      foreach ($appointments as $appointment) {
      ?>
        <tr>
          <td><?= $appointment['date'] ?></td>
          <td><?= $appointment['time'] ?></td>
          <td><?= $appointment['last_name'] ?></td>
          <td><?= $appointment['first_name'] ?></td>
          <td><?= $appointment['phone_number'] ?></td>
          <td><?= $appointment['email'] ?></td>
          <td><?= $appointment['confirmation_number'] ?></td>
        </tr>
      <?php
      }
    ?>
    </table>
  </body>
</html>
