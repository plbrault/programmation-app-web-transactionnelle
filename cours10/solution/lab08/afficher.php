<?php
  include_once('connexionBD.php');

  if (!isset($_GET['id'])) {
    echo 'Paramètre <strong>id</strong> manquant.';
    exit;
  }

  $idSerie = intval($_GET['id']);

  $requete = $bdd->prepare(
    'SELECT titre, diffuseurs.nom AS nomDiffuseur, nbSaisons, nbEpisodes, nbEpisodesVus
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
      <?= $serie['titre'] ?>
    </title>
    <link rel="stylesheet" href="/cours10/solution/lab08/style.css"> 
  </head>
  <body>
    <p>
      <a href="/cours10/solution/lab08/">Séries</a>
      &nbsp;/&nbsp;
      <?= $serie['titre'] ?>
    </p>
    <h1><?= $serie['titre'] ?></h1>   
    
    <p>
      <a href="modifier.php?id=<?= $idSerie ?>">
        ✏️
      </a>
      &nbsp;
      <a
        onclick="return confirm('Voulez-vous vraiment supprimer la série « <?= $serie['titre'] ?> » ?')"
        href="supprimer.php?id=<?= $idSerie ?>"
      >
        ❌
      </a>
    </p>

    <main>
      <p>
        <strong>Diffuseur: </strong>
        <?= $serie['nomdiffuseur'] ?>
      </p>
      <p>
        <strong>Nombre de saisons: </strong>
        <?= $serie['nbsaisons'] ?>
      </p>
      <p>
        <strong>Nombre d'épisodes: </strong>
        <?= $serie['nbepisodes'] ?>
      </p>
      <p>
        <strong>Nombre d'épisodes vus: </strong>
        <?= $serie['nbepisodesvus'] ?>
      </p>            
    </main>
  </body>
</html>
