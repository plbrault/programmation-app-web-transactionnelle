<!DOCTYPE html>
<html>
  <head>
    <title>Liste des rendez-vous</title>
    <link rel="stylesheet" type="text/css" href="public/css/global.css" />
  </head>
  <body>
    <?php include(__DIR__ . '/header.php') ?>
    <h1>Liste des rendez-vous</h1>
    <table>
      <thead>
        <tr>
          <th>Date</th>
          <th>Heure</th>
          <th>Nom</th>
          <th>Prénom</th>
          <th>Tél</th>
          <th>Courriel</th>
          <th># confirmation</th>
        </tr>
      </thead>
      <tbody id="task_table_body">
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
      </tbody>
    </table>
    <script src="public/js/list.js"></script>
  </body>
</html>
