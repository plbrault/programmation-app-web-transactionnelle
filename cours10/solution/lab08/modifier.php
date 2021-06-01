<?php
  if (!isset($_GET['id'])) {
    echo 'Paramètre <strong>id</strong> manquant.';
    exit;
  }
  $idSerie = intval($_GET['id']);

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

    $requete = $bdd->prepare('UPDATE series SET titre = ?, diffuseur = ?, nbSaisons = ?, nbEpisodes = ?, nbEpisodesVus = ? WHERE id = ?');
    $requete->execute([ $titre, $diffuseur, $nbSaisons, $nbEpisodes, $nbEpisodesVus, $idSerie ]);

    header("Location: /cours10/solution/lab08/afficher.php?id=$idSerie");

  } else {
    $requete = $bdd->prepare(
      'SELECT titre, diffuseur, diffuseurs.nom AS nomDiffuseur, nbSaisons, nbEpisodes, nbEpisodesVus
        FROM series JOIN diffuseurs ON diffuseurs.code = series.diffuseur WHERE id = ?'
    );
    $requete->execute(array($idSerie));
    
    $serie = $requete->fetch();
  
    $requete->closeCursor();

    ?>
      <!DOCTYPE html>
      <html>
        <head>
          <title>
            <?= 'Modifier « ' . $serie['titre'] . ' »' ?>
          </title>
          <link rel="stylesheet" href="/cours10/solution/lab08/style.css"> 
        </head>
        <body>
        <p>
          <a href="/cours10/solution/lab08/">Séries</a>
            &nbsp;/&nbsp;
            <?= $serie['titre'] ?>
          </p>
          <h1><?= 'Modifier « ' . $serie['titre'] . ' »' ?></h1>
          <p>
            <a href="afficher.php?id=<?= $idSerie ?>">Annuler</a>
          </p>          
          <main>
            <form action="modifier.php?id=<?= $idSerie ?>" method="POST">
              <p>
                <label for="titre_input">Titre:</label>
                <input type="text" id="titre_input" name="titre" value="<?= $serie['titre'] ?>"  required />
              </p>
              <p>
                <label for="diffuseur_select">Diffuseur:</label>
                <select id="diffuseur_input" name="diffuseur" value="<?= $serie['diffuseur'] ?>" required>
                  <option value="">Sélectionner un diffuseur</option>
                  <?php
                    $reponse = $bdd->query('SELECT code, nom FROM diffuseurs ORDER BY nom');
                    while ($diffuseur = $reponse->fetch()) {
                      echo '<option value="' . $diffuseur['code'] . '"' . ($diffuseur['code'] === $serie['diffuseur'] ? 'selected' : '') . '>' . $diffuseur['nom'] . '</option>';
                    }
                    $reponse->closeCursor();
                  ?>
                </select>
              </p>
              <p>
                <label for="nbSaisons_input">Nombre de saisons:</label>
                <input type="number" id="nbSaisons_input" name="nbSaisons" value="<?= $serie['nbsaisons'] ?>" />
              </p>
              <p>
                <label for="nbEpisodes_input">Nombre d'épisodes:</label>
                <input type="number" id="nbEpisodes_input" name="nbEpisodes" value="<?= $serie['nbepisodes'] ?>" />
              </p>
              <p>
                <label for="nbEpisodesVus_input">Nombre d'épisodes vus:</label>
                <input type="number" id="nbEpisodesVus_input" name="nbEpisodesVus" value="<?= $serie['nbepisodesvus'] ?>" />
              </p>                         
              <input type="submit" name="submit" value="Soumettre" />
            </form>
          </main>
        </body>
      </html>
    <?php
  }
?>
