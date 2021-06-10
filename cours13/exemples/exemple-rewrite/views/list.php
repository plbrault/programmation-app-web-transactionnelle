<!DOCTYPE html>
<html>
  <head>
    <title>
      Liste de contacts
    </title>
    <link rel="stylesheet" href="public/style.css"> 
  </head>
  <body>
    <h1>Liste de contacts</h1>

    <main>
      <p>
        <a href="add">Ajouter un contact</a>
      </p>

      <table>
        <thead>
          <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
            foreach ($contacts as $contact) {
              ?>
                <tr class="ligne-donnees">
                  <td onClick="window.location.href='display/<?= $contact['id'] ?>'">
                    <?= $contact['last_name'] ?>
                  </td>
                  <td onClick="window.location.href='display/<?= $contact['id'] ?>'">
                    <?= $contact['first_name'] ?>
                  </td>
                  <td class="col-actions">
                    <a href="edit/<?= $contact['id'] ?>">
                      ✏️
                    </a>
                    &nbsp;
                    <a
                      onclick="return confirm('Voulez-vous vraiment supprimer le contact « <?= $contact['last_name'] . ', ' . $contact['first_name'] ?> » ?')"
                      href="delete/<?= $contact['id'] ?>"
                    >
                      ❌
                    </a>
                  </td>
                </tr>
              <?php
            }
          ?>
        </tbody>
      </table>
    </main>
  </body>
</html>
