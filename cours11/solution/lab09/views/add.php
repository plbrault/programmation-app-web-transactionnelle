<!DOCTYPE html>
<html>
  <head>
    <title>
      Nouvelle série
    </title>
    <link rel="stylesheet" href="/cours11/solution/lab09/public/style.css"> 
  </head>
  <body>
  <p>
    <a href="?action=list">Séries</a>
      &nbsp;/&nbsp;
      Nouvelle série
    </p>          
    <h1>Nouvelle série</h1>
    <main>
      <form action="?action=add" method="POST">
        <p>
          <label for="titre_input">Titre:</label>
          <input type="text" id="titre_input" name="titre" required />
        </p>
        <p>
          <label for="diffuseur_select">Diffuseur:</label>
          <select id="diffuseur_input" name="diffuseur" required>
            <option value="">Sélectionner un diffuseur</option>
            <?php
              foreach ($distributors as $distributor) {
                echo '<option value="' . $distributor['code'] . '">' . $distributor['name'] . '</option>';
              }
            ?>
          </select>
        </p>
        <p>
          <label for="nbSaisons_input">Nombre de saisons:</label>
          <input type="number" id="nbSaisons_input" name="nbSaisons" />
        </p>
        <p>
          <label for="nbEpisodes_input">Nombre d'épisodes:</label>
          <input type="number" id="nbEpisodes_input" name="nbEpisodes" />
        </p>
        <p>
          <label for="nbEpisodesVus_input">Nombre d'épisodes vus:</label>
          <input type="number" id="nbEpisodesVus_input" name="nbEpisodesVus" />
        </p>                         
        <input type="submit" name="submit" value="Soumettre" />
      </form>
    </main>
  </body>
</html>
