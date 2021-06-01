<?php
  include_once('connexionBD.php');

  if (isset($_POST['submit'])) {
    if (
      !isset($_POST['titre'])
      || !isset($_POST['diffuseur'])
      || !isset($_POST['nbSaisons'])
      || !isset($_POST['nbEpisodes'])
      || !isset($_POST['nbEpisodesVus'])
    ) {
      exit;
    }
    if (empty($_POST['titre']) || empty($_POST['diffuseur'])) {
      exit;
    }

    $titre = trim($_POST['titre']);
    $diffuseur = trim($_POST['diffuseur']);
    $nbSaisons = intval($_POST['nbSaisons']);
    $nbEpisodes = intval($_POST['nbEpisodes']);
    $nbEpisodesVus = intval($_POST['nbEpisodesVus']);

    $requete = $bdd->prepare('INSERT INTO series(titre, diffuseur, nbSaisons, nbEpisodes, nbEpisodesVus) VALUES(?, ?, ?, ?, ?) RETURNING id');
    $requete->execute([ $titre, $diffuseur, $nbSaisons, $nbEpisodes, $nbEpisodesVus ]);

    $resultat = $requete->fetch();
    $idSerie = $resultat['id'];
    $requete->closeCursor();

    header("Location: /cours10/solution/lab08/afficher.php?id=$idSerie");

  } else {
    ?>
      <!DOCTYPE html>
      <html>
        <head>
          <title>
            Nouvelle série
          </title>
          <link rel="stylesheet" href="style.css"> 
        </head>
        <body>
        <p>
          <a href="/cours10/solution/lab08">Séries</a>
            &nbsp;/&nbsp;
            Nouvelle série
          </p>          
          <h1>Nouvelle série</h1>
          <main>
            <form action="ajouter.php" method="POST">
              <p>
                <label for="titre_input">Titre:</label>
                <input type="text" id="titre_input" name="titre" required />
              </p>
              <p>
                <label for="diffuseur_select">Diffuseur:</label>
                <select id="diffuseur_input" name="diffuseur" required>
                  <option value="">Sélectionner un diffuseur</option>
                  <?php
                    $reponse = $bdd->query('SELECT code, nom FROM diffuseurs ORDER BY nom');
                    while ($diffuseur = $reponse->fetch()) {
                      echo '<option value="' . $diffuseur['code'] . '">' . $diffuseur['nom'] . '</option>';
                    }
                    $reponse->closeCursor();
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
    <?php
  }
?>
