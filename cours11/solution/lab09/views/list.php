<!DOCTYPE html>
<html>
  <head>
    <title>
      Mes séries
    </title>
    <link rel="stylesheet" href="/cours11/solution/lab09/public/style.css"> 
  </head>
  <body>
    <h1>Mes séries</h1>

    <main>
      <p>
        <a href="?action=add">Ajouter une série</a>
      </p>

      <table>
        <thead>
          <tr>
            <th>Titre</th>
            <th>Diffuseur</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
            foreach ($series as $serie) {
              ?>
                <tr class="ligne-donnees">
                  <td onClick="window.location.href='?action=display&id=<?= $serie['id'] ?>'">
                    <?= $serie['title'] ?>
                  </td>
                  <td onClick="window.location.href='?action=display&id=<?= $serie['id'] ?>'">
                    <?= $serie['distributor_name'] ?>
                  </td>
                  <td class="col-actions">
                    <a href="?action=edit&id=<?= $serie['id'] ?>">
                      ✏️
                    </a>
                    &nbsp;
                    <a
                      onclick="return confirm('Voulez-vous vraiment supprimer la série « <?= $serie['title'] ?> » ?')"
                      href="?action=delete&id=<?= $serie['id'] ?>"
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
