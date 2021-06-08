<!DOCTYPE html>
<html>
  <head>
    <title>
      <?= 'Modifier « ' . $serie['title'] . ' »' ?>
    </title>
    <link rel="stylesheet" href="/cours11/solution/lab09/public/style.css"> 
  </head>
  <body>
  <p>
    <a href="?action=list">Séries</a>
      &nbsp;/&nbsp;
      <?= $serie['title'] ?>
    </p>
    <h1><?= 'Modifier « ' . $serie['title'] . ' »' ?></h1>
    <p>
      <a href="?action=display&id=<?= $id ?>">Annuler</a>
    </p>          
    <main>
      <form action="?action=edit&id=<?= $id ?>" method="POST">
        <p>
          <label for="titre_input">Titre:</label>
          <input type="text" id="titre_input" name="titre" value="<?= $serie['title'] ?>"  required />
        </p>
        <p>
          <label for="diffuseur_select">Diffuseur:</label>
          <select id="diffuseur_input" name="diffuseur" required>
            <option value="">Sélectionner un diffuseur</option>
            <?php
              foreach ($distributors as $distributor) {
                echo '<option value="' . $distributor['code'] . '" ' . ($distributor['code'] === $serie['distributor_code'] ? 'selected' : '') . '>' . $distributor['name'] . '</option>';
              }
            ?>
          </select>
        </p>
        <p>
          <label for="nbSaisons_input">Nombre de saisons:</label>
          <input type="number" id="nbSaisons_input" name="nbSaisons" value="<?= $serie['nb_seasons'] ?>" />
        </p>
        <p>
          <label for="nbEpisodes_input">Nombre d'épisodes:</label>
          <input type="number" id="nbEpisodes_input" name="nbEpisodes" value="<?= $serie['nb_episodes'] ?>" />
        </p>
        <p>
          <label for="nbEpisodesVus_input">Nombre d'épisodes vus:</label>
          <input type="number" id="nbEpisodesVus_input" name="nbEpisodesVus" value="<?= $serie['nb_viewed_episodes'] ?>" />
        </p>                         
        <input type="submit" name="submit" value="Soumettre" />
      </form>
    </main>
  </body>
</html>
