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
          /* AJOUTER DU CODE CI-DESSOUS */

          /* FIN DU CODE AJOUTÉ */
        ?>
      </tbody>
    </table>
    <script src="public/js/list.js"></script>
  </body>
</html>
